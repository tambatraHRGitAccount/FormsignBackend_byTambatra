<?php

namespace App\ApiResource;

use App\Dto\DocumentDto;
use App\State\DocumentState;
use App\State\DocumentProcessor;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new Get(
            provider: DocumentState::class
        ),
        new GetCollection(
            provider: DocumentState::class
        ),
        new Post(
            input: DocumentDto::class,
            processor: DocumentProcessor::class
        ),
        new Patch(
            input: DocumentDto::class,
            processor: DocumentProcessor::class
        ),
        new Delete()
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

    #[Groups(['read'])]
    public ?string $insertAfterId;

    #[Groups(['read', 'write'])]
    public string $file;

    #[Groups(['read', 'write'])]
    public string $name;

    #[Groups(['read', 'write'])]
    public bool $isSignable;

    #[Groups(['read', 'write'])]
    public string $initialHash;

    #[Groups(['read', 'write'])]
    public string $signedHash;

    #[Groups(['read', 'write'])]
    public string $mimeType;

    #[Groups(['read'])]
    public \DateTimeInterface $createdAt;
}