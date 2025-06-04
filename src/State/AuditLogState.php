<?php

namespace App\State;

use App\ApiResource\AuditLogResource;
use App\Entity\AuditLog;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class AuditLogState implements ProviderInterface
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
            $auditLog = $this->entityManager->getRepository(AuditLog::class)->find($uriVariables['id']);
            $this->logger->info('Fetched AuditLog by ID', ['id' => $uriVariables['id'], 'result' => $auditLog]);
            return $auditLog ? $this->mapToResource($auditLog) : null;
        }

        $auditLogs = $this->entityManager->getRepository(AuditLog::class)->findAll();
        $this->logger->info('Fetched all AuditLogs', ['count' => count($auditLogs)]);
        return array_map([$this, 'mapToResource'], $auditLogs);
    }

    private function mapToResource(AuditLog $auditLog): AuditLogResource
    {
        $resource = new AuditLogResource();
        $resource->id = $auditLog->getId();
        $resource->signatureRequestId = $auditLog->getSignatureRequest()->getId();
        $resource->eventType = $auditLog->getEventType();
        $resource->eventData = $auditLog->getEventData();
        $resource->eventDatetime = $auditLog->getEventDatetime();
        return $resource;
    }
}