<?php

namespace App\ApiResource;

use App\Dto\DocumentDto;
use App\State\DocumentState;
use App\State\DocumentProcessor;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new Get(
            uriTemplate: '/documents/{id}',
            provider: DocumentState::class
        ),
        new GetCollection(
            uriTemplate: '/documents',
            provider: DocumentState::class
        ),
        new Patch(
            uriTemplate: '/documents/{id}',
            input: DocumentDto::class,
            processor: DocumentProcessor::class
        ),
        new Delete(
            uriTemplate: '/documents/{id}'
        )
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class DocumentResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read'])]
    public string $signatureRequestId;

    #[Groups(['read', 'write'])]
    public string $name;

    #[Groups(['read', 'write'])]
    public string $content;

    #[Groups(['read', 'write'])]
    public bool $isSignable;

    #[Groups(['read'])]
    public string $initialHash;

    #[Groups(['read', 'write'])]
    public ?string $signedHash;

    #[Groups(['read', 'write'])]
    public ?array $signatureSettings;

    #[Groups(['read', 'write'])]
    public ?array $initialSettings;

    #[Groups(['read', 'write'])]
    public ?string $insertAfterId;

    #[Groups(['read'])]
    public \DateTimeInterface $createdAt;

    #[Groups(['read'])]
    public ?\DateTimeInterface $updatedAt;
}