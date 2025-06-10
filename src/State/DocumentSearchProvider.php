<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\DocumentSearch;
use App\Entity\Document;
use App\Repository\DocumentRepository;

class DocumentSearchProvider implements ProviderInterface
{
    public function __construct(
        private DocumentRepository $documentRepository
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        return array_map(function (Document $document) {
            return DocumentSearch::mapFromDocument($document);
        }, $this->documentRepository->findAllByFilter($context['filters'] ?? []));
    }
}