<?php

namespace App\State;

use App\ApiResource\UserAccountResource;
use App\Dto\UserAccountDto;
use App\Entity\UserAccount;
use App\Entity\Folder;
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

        $folder = $this->entityManager->getRepository(Folder::class)->find($data->folderId);
        if (!$folder) {
            $this->logger->error('Folder not found', ['id' => $data->folderId]);
            throw new NotFoundHttpException('Folder not found for ID: ' . $data->folderId);
        }

        $userAccount = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(UserAccount::class)->find($uriVariables['id'])
            : new UserAccount();

        if (!$userAccount) {
            $this->logger->error('UserAccount not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('UserAccount not found');
        }

        $userAccount->setFolder($folder);
        $userAccount->setApiToken($data->apiToken);
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
        $resource->folderId = $userAccount->getFolder()->getId();
        $resource->apiToken = $userAccount->getApiToken();
        $resource->createdAt = $userAccount->getCreatedAt();
        $resource->updatedAt = $userAccount->getUpdatedAt();
        return $resource;
    }
}