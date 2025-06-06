<?php

namespace App\State;

use App\ApiResource\SignatureRequestResource;
use App\Dto\DocumentDto;
use App\Entity\Document;
use App\Entity\SignatureRequest;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DocumentProcessor implements ProcessorInterface
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
        $this->logger->info('Processing DocumentDto', ['operation' => $operation->getName(), 'signatureRequestId' => $uriVariables['signatureRequestId'] ?? $uriVariables['id'] ?? null]);

        if (!$data instanceof DocumentDto) {
            $this->logger->error('Data is not an instance of DocumentDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $signatureRequestId = $uriVariables['signatureRequestId'] ?? $uriVariables['id'] ?? null;
        if ($operation instanceof Post && !$signatureRequestId) {
            $this->logger->error('Missing signatureRequestId in URI variables');
            throw new BadRequestHttpException('SignatureRequestId is required');
        }

        $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($signatureRequestId);
        if (!$signatureRequest) {
            $this->logger->error('SignatureRequest not found', ['id' => $signatureRequestId]);
            throw new NotFoundHttpException('SignatureRequest not found for ID: ' . $signatureRequestId);
        }

        $document = ($operation instanceof Patch && isset($uriVariables['id']))
            ? $this->entityManager->getRepository(Document::class)->find($uriVariables['id'])
            : new Document();

        if (!$document) {
            $this->logger->error('Document not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('Document not found');
        }

        $document->setSignatureRequest($signatureRequest);
        $document->setName($data->name ?? 'document.pdf');
        $document->setContent($data->content);
        $document->setIsSignable($data->isSignable);
        $document->setSignedHash($data->signedHash);
        $document->setSignatureSettings($data->signatureSettings);
        $document->setInitialSettings($data->initialSettings);
        $document->setInsertAfterId($data->insertAfterId);
        $document->setUpdatedAt(new \DateTime());

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($document);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('Document persisted successfully', ['id' => $document->getId(), 'signatureRequestId' => $signatureRequest->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist Document', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist Document: ' . $e->getMessage());
        }

        return $this->mapToResource($signatureRequest);
    }

    private function mapToResource(SignatureRequest $signatureRequest): SignatureRequestResource
    {
        $resource = new SignatureRequestResource();
        $resource->id = $signatureRequest->getId();
        $resource->senderId = $signatureRequest->getSender()->getId();
        $resource->folderId = $signatureRequest->getFolder() ? $signatureRequest->getFolder()->getId() : null;
        $resource->name = $signatureRequest->getName();
        $resource->email = ['sender' => 'formsign', 'message' => $signatureRequest->getEmailMessage()];
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