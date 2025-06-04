<?php

namespace App\State;

use App\ApiResource\DocumentResource;
use App\Dto\DocumentDto;
use App\Entity\Document;
use App\Entity\SignatureRequest;
use ApiPlatform\Metadata\Operation;
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
        $this->logger->info('Processing DocumentDto', ['data' => (array)$data]);

        if (!$data instanceof DocumentDto) {
            $this->logger->error('Data is not an instance of DocumentDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($data->signatureRequestId);
        if (!$signatureRequest) {
            $this->logger->error('SignatureRequest not found', ['id' => $data->signatureRequestId]);
            throw new NotFoundHttpException('SignatureRequest not found for ID: ' . $data->signatureRequestId);
        }

        $insertAfter = null;
        if ($data->insertAfterId) {
            $insertAfter = $this->entityManager->getRepository(Document::class)->find($data->insertAfterId);
            if (!$insertAfter) {
                $this->logger->error('InsertAfter Document not found', ['id' => $data->insertAfterId]);
                throw new NotFoundHttpException('InsertAfter Document not found for ID: ' . $data->insertAfterId);
            }
        }

        $document = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(Document::class)->find($uriVariables['id'])
            : new Document();

        if (!$document) {
            $this->logger->error('Document not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('Document not found');
        }

        $document->setSignatureRequest($signatureRequest);
        $document->setInsertAfter($insertAfter);
        $document->setFile($data->file);
        $document->setName($data->name);
        $document->setIsSignable($data->isSignable);
        $document->setInitialHash($data->initialHash);
        $document->setSignedHash($data->signedHash);
        $document->setMimeType($data->mimeType);

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($document);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('Document persisted successfully', ['id' => $document->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist Document', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist Document: ' . $e->getMessage());
        }

        $resource = new DocumentResource();
        $resource->id = $document->getId();
        $resource->signatureRequestId = $document->getSignatureRequest()->getId();
        $resource->insertAfterId = $document->getInsertAfter() ? $document->getInsertAfter()->getId() : null;
        $resource->file = $document->getFile();
        $resource->name = $document->getName();
        $resource->isSignable = $document->isSignable();
        $resource->initialHash = $document->getInitialHash();
        $resource->signedHash = $document->getSignedHash();
        $resource->mimeType = $document->getMimeType();
        $resource->createdAt = $document->getCreatedAt();
        return $resource;
    }
}