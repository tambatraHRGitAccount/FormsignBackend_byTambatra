<?php

namespace App\State;

use App\ApiResource\SenderResource;
use App\Entity\Sender;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class SenderState implements ProviderInterface
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
            $sender = $this->entityManager->getRepository(Sender::class)->find($uriVariables['id']);
            $this->logger->info('Fetched Sender by ID', ['id' => $uriVariables['id'], 'result' => $sender]);
            return $sender ? $this->mapToResource($sender) : null;
        }

        $senders = $this->entityManager->getRepository(Sender::class)->findAll();
        $this->logger->info('Fetched all Senders', ['count' => count($senders)]);
        return array_map([$this, 'mapToResource'], $senders);
    }

    private function mapToResource(Sender $sender): SenderResource
    {
        $resource = new SenderResource();
        $resource->id = $sender->getId();
        $resource->email = $sender->getEmail();
        $resource->status = $sender->getStatus();
        $resource->createdAt = $sender->getCreatedAt();
        $resource->updatedAt = $sender->getUpdatedAt();
        return $resource;
    }
}