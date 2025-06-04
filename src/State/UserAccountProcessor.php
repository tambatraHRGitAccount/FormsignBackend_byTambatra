<?php

namespace App\State;

use App\ApiResource\UserAccountResource;
use App\Dto\UserAccountDto;
use App\Entity\UserAccount;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserAccountProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        $this->logger->info('Processing UserAccountDto', ['data' => (array)$data]);

        if (!$data instanceof UserAccountDto) {
            $this->logger->error('Data is not an instance of UserAccountDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $userAccount = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(UserAccount::class)->find($uriVariables['id'])
            : new UserAccount();

        if (!$userAccount) {
            $this->logger->error('UserAccount not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('UserAccount not found');
        }

        // Generate apiToken only for new UserAccounts (POST)
        if ($operation instanceof \ApiPlatform\Metadata\Post) {
            $apiToken = 'token-' . bin2hex(random_bytes(16)); // Generates a 32-character token
            $userAccount->setApiToken($apiToken);
        }

        $userAccount->setEmail($data->email);
        $userAccount->setUpdatedAt(new \DateTime());

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($userAccount);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('UserAccount persisted successfully', ['id' => $userAccount->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist UserAccount', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist UserAccount: ' . $e->getMessage());
        }

        $resource = new UserAccountResource();
        $resource->id = $userAccount->getId();
        $resource->email = $userAccount->getEmail();
        $resource->apiToken = $userAccount->getApiToken();
        $resource->createdAt = $userAccount->getCreatedAt();
        $resource->updatedAt = $userAccount->getUpdatedAt();
        return $resource;
    }
}