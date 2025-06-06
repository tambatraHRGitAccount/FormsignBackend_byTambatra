<?php

namespace App\State;

use App\ApiResource\SignatureRequestResource;
use App\Dto\SignatureRequestDto;
use App\Entity\SignatureRequest;
use App\Entity\Sender;
use App\Entity\Folder;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SignatureRequestProcessor implements ProcessorInterface
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
        $this->logger->info('Processing SignatureRequest', ['operation' => $operation->getName()]);

        if ($operation->getName() === 'activate_signature_request') {
            $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($uriVariables['id']);
            if (!$signatureRequest) {
                $this->logger->error('SignatureRequest not found for ID', ['id' => $uriVariables['id']]);
                throw new NotFoundHttpException('SignatureRequest not found');
            }
            $signatureRequest->setStatus('active');
            $signatureRequest->setUpdatedAt(new \DateTime());

            try {
                $this->entityManager->beginTransaction();
                $this->entityManager->persist($signatureRequest);
                $this->entityManager->flush();
                $this->entityManager->commit();
                $this->logger->info('SignatureRequest activated', ['id' => $signatureRequest->getId()]);
            } catch (\Exception $e) {
                $this->entityManager->rollback();
                $this->logger->error('Failed to activate SignatureRequest', ['exception' => $e->getMessage()]);
                throw new BadRequestHttpException('Failed to activate: ' . $e->getMessage());
            }

            return $this->mapToResource($signatureRequest);
        }

        if (!$data instanceof SignatureRequestDto) {
            $this->logger->error('Data is not an instance of SignatureRequestDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        if (!isset($data->email['message'])) {
            $this->logger->error('Missing email message', ['data' => (array)$data]);
            throw new BadRequestHttpException('Email message is required');
        }

        $sender = $this->entityManager->getRepository(Sender::class)->find($data->senderId);
        if (!$sender) {
            $this->logger->error('Sender not found', ['id' => $data->senderId]);
            throw new NotFoundHttpException('Sender not found for ID: ' . $data->senderId);
        }

        $folder = $data->folderId ? $this->entityManager->getRepository(Folder::class)->find($data->folderId) : null;
        if ($data->folderId && !$folder) {
            $this->logger->error('Folder not found', ['id' => $data->folderId]);
            throw new NotFoundHttpException('Folder not found for ID: ' . $data->folderId);
        }

        $signatureRequest = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(SignatureRequest::class)->find($uriVariables['id'])
            : new SignatureRequest();

        if (!$signatureRequest) {
            $this->logger->error('SignatureRequest not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('SignatureRequest not found');
        }

        $signatureRequest->setSender($sender);
        $signatureRequest->setFolder($folder);
        $signatureRequest->setName($data->name);
        $signatureRequest->setEmailMessage($data->email['message']);
        $signatureRequest->setExpirationDate($data->expirationDate);
        $signatureRequest->setTimezone($data->timezone);
        $signatureRequest->setSignersAllowedToDecline($data->signersAllowedToDecline);
        $signatureRequest->setStatus($data->status ?? 'draft');
        $signatureRequest->setReminderSettings($data->reminderSettings);
        $signatureRequest->setWebhooks($data->webhooks);
        $signatureRequest->setAuditEvents($data->auditEvents ?? []);
        $signatureRequest->setUpdatedAt(new \DateTime());

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($signatureRequest);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('SignatureRequest persisted successfully', ['id' => $signatureRequest->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist SignatureRequest', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist SignatureRequest: ' . $e->getMessage());
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