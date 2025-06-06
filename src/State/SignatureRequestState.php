<?php

namespace App\State;

use App\ApiResource\SignatureRequestResource;
use App\Entity\SignatureRequest;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class SignatureRequestState implements ProviderInterface
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
            $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($uriVariables['id']);
            $this->logger->info('Fetched SignatureRequest by ID', ['id' => $uriVariables['id'], 'result' => $signatureRequest]);
            return $signatureRequest ? $this->mapToResource($signatureRequest) : null;
        }

        $signatureRequests = $this->entityManager->getRepository(SignatureRequest::class)->findAll();
        $this->logger->info('Fetched all SignatureRequests', ['count' => count($signatureRequests)]);
        return array_map([$this, 'mapToResource'], $signatureRequests);
    }

    private function mapToResource(SignatureRequest $signatureRequest): SignatureRequestResource
    {
        $resource = new SignatureRequestResource();
        $resource->id = $signatureRequest->getId();
        $resource->senderId = $signatureRequest->getSender()->getId();
        $resource->folderId = $signatureRequest->getFolder() ? $signatureRequest->getFolder()->getId() : null;
        $resource->name = $signatureRequest->getName();
        $resource->emailMessage = $signatureRequest->getEmailMessage();
        $resource->expirationDate = $signatureRequest->getExpirationDate();
        $resource->timezone = $signatureRequest->getTimezone();
        $resource->signersAllowedToDecline = $signatureRequest->isSignersAllowedToDecline();
        $resource->status = $signatureRequest->getStatus();
        $resource->reminderSettings = $signatureRequest->getReminderSettings();
        $resource->webhooks = $signatureRequest->getWebhooks();
        $resource->auditEvents = $signatureRequest->getAuditEvents();
        $resource->createdAt = $signatureRequest->getCreatedAt();
        $resource->updatedAt = $signatureRequest->getUpdatedAt();
        $resource->documents = $signatureRequest->getDocuments()->toArray();
        $resource->signers = $signatureRequest->getSigners()->toArray();
        return $resource;
    }
}