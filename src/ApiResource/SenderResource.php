<?php

namespace App\ApiResource;

use App\Dto\SenderDto;
use App\State\SenderState;
use App\State\SenderProcessor;
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
            provider: SenderState::class
        ),
        new GetCollection(
            provider: SenderState::class
        ),
        new Post(
            input: SenderDto::class,
            processor: SenderProcessor::class
        ),
        new Patch(
            input: SenderDto::class,
            processor: SenderProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class SenderResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read', 'write'])]
    public string $email;

    #[Groups(['read'])]
    public string $status;

    #[Groups(['read'])]
    public \DateTimeInterface $createdAt;

    #[Groups(['read'])]
    public ?\DateTimeInterface $updatedAt;
}