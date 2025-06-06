<?php

namespace App\State;

use App\ApiResource\DocumentResource;
use App\Entity\Document;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class DocumentState implements ProviderInterface
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
            $document = $this->entityManager->getRepository(Document::class)->find($uriVariables['id']);
            $this->logger->info('Fetched Document by ID', ['id' => $uriVariables['id'], 'result' => $document]);
            return $document ? $this->mapToResource($document) : null;
        }

        $documents = $this->entityManager->getRepository(Document::class)->findAll();
        $this->logger->info('Fetched all Documents', ['count' => count($documents)]);
        return array_map([$this, 'mapToResource'], $documents);
    }

    private function mapToResource(Document $document): DocumentResource
    {
        $resource = new DocumentResource();
        $resource->id = $document->getId();
        $resource->signatureRequestId = $document->getSignatureRequest()->getId();
        $resource->name = $document->getName();
        $resource->content = $document->getContent();
        $resource->isSignable = $document->isSignable();
        $resource->initialHash = $document->getInitialHash();
        $resource->signedHash = $document->getSignedHash();
        $resource->signatureSettings = $document->getSignatureSettings();
        $resource->initialSettings = $document->getInitialSettings();
        $resource->insertAfterId = $document->getInsertAfterId();
        $resource->createdAt = $document->getCreatedAt();
        $resource->updatedAt = $document->getUpdatedAt();
        return $resource;
    }
}