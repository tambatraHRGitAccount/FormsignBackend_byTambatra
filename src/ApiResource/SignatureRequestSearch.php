<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\SignatureRequest;
use App\State\SignatureRequestSearchProvider;

#[GetCollection(
    provider: SignatureRequestSearchProvider::class,
    uriTemplate: '/signature-requests-search',
)]
#[QueryParameter(key: 'id')]
#[QueryParameter(key: 'name')]
#[QueryParameter(key: 'status')]
#[QueryParameter(key: 'expirationDate')]
#[QueryParameter(key: 'signersAllowedToDecline')]
#[QueryParameter(key: 'senderId')]
class SignatureRequestSearch
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?\DateTimeInterface $expirationDate = null,
        public ?bool $signersAllowedToDecline = null,
        public ?string $senderId = null,
        public ?string $timezone = null, // Non-filterable
        public ?\DateTimeInterface $createdAt = null, // Non-filterable
        public ?\DateTimeInterface $updatedAt = null, // Non-filterable
        public ?array $reminderSettings = null, // Non-filterable
        public ?array $auditEvents = null, // Non-filterable
        public ?array $webhooks = null // Non-filterable, Added
    ) {
    }

    public static function mapFromSignatureRequest(SignatureRequest $signatureRequest): SignatureRequestSearch
    {
        return new SignatureRequestSearch(
            id: $signatureRequest->getId(),
            name: $signatureRequest->getName(),
            status: $signatureRequest->getStatus(),
            expirationDate: $signatureRequest->getExpirationDate(),
            signersAllowedToDecline: $signatureRequest->isSignersAllowedToDecline(),
            senderId: $signatureRequest->getSender()->getId(),
            timezone: $signatureRequest->getTimezone(),
            createdAt: $signatureRequest->getCreatedAt(),
            updatedAt: $signatureRequest->getUpdatedAt(),
            reminderSettings: $signatureRequest->getReminderSettings(),
            auditEvents: $signatureRequest->getAuditEvents(),
            webhooks: $signatureRequest->getWebhooks() // Added
        );
    }
}