<?php

namespace App\State;

use App\ApiResource\AuditLogResource;
use App\Dto\AuditLogDto;
use App\Entity\AuditLog;
use App\Entity\SignatureRequest;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuditLogProcessor implements ProcessorInterface
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
        $this->logger->info('Processing AuditLogDto', ['data' => (array)$data]);

        if (!$data instanceof AuditLogDto) {
            $this->logger->error('Data is not an instance of AuditLogDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($data->signatureRequestId);
        if (!$signatureRequest) {
            $this->logger->error('SignatureRequest not found', ['id' => $data->signatureRequestId]);
            throw new NotFoundHttpException('SignatureRequest not found for ID: ' . $data->signatureRequestId);
        }

        $auditLog = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(AuditLog::class)->find($uriVariables['id'])
            : new AuditLog();

        if (!$auditLog) {
            $this->logger->error('AuditLog not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('AuditLog not found');
        }

        $auditLog->setSignatureRequest($signatureRequest);
        $auditLog->setEventType($data->eventType);
        $auditLog->setEventData($data->eventData);

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($auditLog);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('AuditLog persisted successfully', ['id' => $auditLog->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist AuditLog', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist AuditLog: ' . $e->getMessage());
        }

        $resource = new AuditLogResource();
        $resource->id = $auditLog->getId();
        $resource->signatureRequestId = $auditLog->getSignatureRequest()->getId();
        $resource->eventType = $auditLog->getEventType();
        $resource->eventData = $auditLog->getEventData();
        $resource->eventDatetime = $auditLog->getEventDatetime();
        return $resource;
    }
}