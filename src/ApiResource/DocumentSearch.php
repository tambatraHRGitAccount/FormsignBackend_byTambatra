<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Document;
use App\State\DocumentSearchProvider;
use Symfony\Component\Uid\Uuid;

#[GetCollection(
    provider: DocumentSearchProvider::class,
    uriTemplate: '/documents-search',
)]
#[QueryParameter(key: 'id')]
#[QueryParameter(key: 'name')]
#[QueryParameter(key: 'isSignable')]
#[QueryParameter(key: 'signedHash')]
#[QueryParameter(key: 'signatureRequestId')]
#[QueryParameter(key: 'insertAfterId')]
class DocumentSearch
{
    public function __construct(
        public ?Uuid $id = null,
        public ?string $name = null,
        public ?bool $isSignable = null,
        public ?string $signedHash = null,
        public ?string $signatureRequestId = null,
        public ?int $insertAfterId = null,
        public ?array $signatureSettings = null, // Added
        public ?array $initial = null // Added
    ) {
    }

    public static function mapFromDocument(Document $document): DocumentSearch
    {
        return new DocumentSearch(
            id: $document->getId(),
            name: $document->getName(),
            isSignable: $document->isSignable(),
            signedHash: $document->getSignedHash(),
            signatureRequestId: $document->getSignatureRequest() ? $document->getSignatureRequest()->getId() : null,
            insertAfterId: $document->getInsertAfterId(),
            signatureSettings: $document->getSignatureSettings(), // Added
            initial: $document->getInitial() // Added
        );
    }
}