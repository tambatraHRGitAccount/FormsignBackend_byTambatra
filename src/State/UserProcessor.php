<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\UserDto;
use App\Entity\User;
use App\Entity\UserLog;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class UserProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;
    private TokenStorageInterface $tokenStorage;
    private AuthorizationCheckerInterface $authorizationChecker;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(
        EntityManagerInterface $entityManager,
        TokenStorageInterface $tokenStorage,
        AuthorizationCheckerInterface $authorizationChecker,
        UserPasswordHasherInterface $passwordHasher
    ) {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
        $this->authorizationChecker = $authorizationChecker;
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @param mixed $data
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return mixed
     */
    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($operation instanceof Delete) {
            $user = $this->entityManager->getRepository(User::class)->find($uriVariables['id']);
            if (!$user) {
                throw new BadRequestHttpException('User not found');
            }
            $this->entityManager->remove($user);
            $this->entityManager->flush();
            return null;
        }

        if ($data instanceof UserDto) {
            if ($operation->getName() === 'get_current_user' || $operation->getName() === 'get_last_login') {
                $token = $this->tokenStorage->getToken();
                if (!$token || !$token->getUser() instanceof User) {
                    throw new UnauthorizedHttpException('Bearer', 'User not authenticated');
                }
                $user = $token->getUser();
            } else {
                if (!empty($uriVariables['id'])) {
                    // PUT: Update existing user
                    $user = $this->entityManager->getRepository(User::class)->find($uriVariables['id']);
                    if (!$user) {
                        throw new BadRequestHttpException('User not found');
                    }
                    // Check if the user is allowed to update this resource
                    if (!$this->authorizationChecker->isGranted('ROLE_ADMIN') && $user->getId() !== ($this->tokenStorage->getToken()?->getUser()?->getId())) {
                        throw new UnauthorizedHttpException('Bearer', 'Not authorized to update this user');
                    }
                } else {
                    // POST: Create new user
                    $user = new User();
                }

                // Map DTO to Entity
                $user->setEmail($data->email);
                $user->setUsername($data->username);
                if ($data->password) {
                    $user->setPassword($this->passwordHasher->hashPassword($user, $data->password));
                }
                if ($data->roles && $this->authorizationChecker->isGranted('ROLE_ADMIN')) {
                    $user->setRoles($data->roles);
                }

                // Persist the entity
                try {
                    $this->entityManager->persist($user);
                    $this->entityManager->flush();
                } catch (\Exception $e) {
                    throw new BadRequestHttpException('Failed to save user: ' . $e->getMessage());
                }
            }

            // Map Entity to DTO for response
            $dto = new UserDto();
            $dto->id = $user->getId();
            $dto->email = $user->getEmail();
            $dto->username = $user->getUsername();
            $dto->roles = $user->getRoles();

            if ($operation->getName() === 'get_last_login') {
                $lastLogin = $this->entityManager->getRepository(UserLog::class)
                    ->findOneBy(['user' => $user], ['loginTime' => 'DESC']);
                $dto->lastLogin = $lastLogin ? $lastLogin->getLoginTime()->format('Y-m-d H:i:s') : null;
            }

            return $dto;
        }

        throw new BadRequestHttpException('Invalid data type');
    }
}