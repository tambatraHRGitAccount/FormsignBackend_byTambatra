<?php

namespace App\State;

use App\ApiResource\UserAccountResource;
use App\Entity\UserAccount;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class UserAccountState implements ProviderInterface
{
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if (isset($uriVariables['id'])) {
            $userAccount = $this->entityManager->getRepository(UserAccount::class)->find($uriVariables['id']);
            $this->logger->info('Fetched UserAccount by ID', ['id' => $uriVariables['id'], 'result' => $userAccount]);
            return $userAccount ? $this->mapToResource($userAccount) : null;
        }

        $userAccounts = $this->entityManager->getRepository(UserAccount::class)->findAll();
        $this->logger->info('Fetched all UserAccounts', ['count' => count($userAccounts)]);
        return array_map([$this, 'mapToResource'], $userAccounts);
    }

    private function mapToResource(UserAccount $userAccount): UserAccountResource
    {
        $resource = new UserAccountResource();
        $resource->id = $userAccount->getId();
        $resource->folderId = $userAccount->getFolder()->getId();
        $resource->apiToken = $userAccount->getApiToken();
        $resource->createdAt = $userAccount->getCreatedAt();
        $resource->updatedAt = $userAccount->getUpdatedAt();
        return $resource;
    }
}