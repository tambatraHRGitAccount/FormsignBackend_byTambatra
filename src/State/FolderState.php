<?php

namespace App\State;

use App\ApiResource\FolderResource;
use App\Entity\Folder;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class FolderState implements ProviderInterface
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
            $folder = $this->entityManager->getRepository(Folder::class)->find($uriVariables['id']);
            $this->logger->info('Fetched Folder by ID', ['id' => $uriVariables['id'], 'result' => $folder]);
            return $folder ? $this->mapToResource($folder) : null;
        }

        $folders = $this->entityManager->getRepository(Folder::class)->findAll();
        $this->logger->info('Fetched all Folders', ['count' => count($folders)]);
        return array_map([$this, 'mapToResource'], $folders);
    }

    private function mapToResource(Folder $folder): FolderResource
    {
        $resource = new FolderResource();
        $resource->id = $folder->getId();
        $resource->name = $folder->getName();
        $resource->createdAt = $folder->getCreatedAt();
        $resource->updatedAt = $folder->getUpdatedAt();
        return $resource;
    }
}