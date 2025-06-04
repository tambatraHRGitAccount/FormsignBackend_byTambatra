<?php

namespace App\ApiResource;

use App\Dto\AuditLogDto;
use App\State\AuditLogState;
use App\State\AuditLogProcessor;
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
            provider: AuditLogState::class
        ),
        new GetCollection(
            provider: AuditLogState::class
        ),
        new Post(
            input: AuditLogDto::class,
            processor: AuditLogProcessor::class
        ),
        new Patch(
            input: AuditLogDto::class,
            processor: AuditLogProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class AuditLogResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read'])]
    public string $signatureRequestId;

    #[Groups(['read', 'write'])]
    public string $eventType;

    #[Groups(['read', 'write'])]
    public array $eventData;

    #[Groups(['read'])]
    public \DateTimeInterface $eventDatetime;
}