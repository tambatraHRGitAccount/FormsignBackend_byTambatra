<?php

namespace App\ApiResource;

use App\Dto\FolderDto;
use App\State\FolderState;
use App\State\FolderProcessor;
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
            provider: FolderState::class
        ),
        new GetCollection(
            provider: FolderState::class
        ),
        new Post(
            input: FolderDto::class,
            processor: FolderProcessor::class
        ),
        new Patch(
            input: FolderDto::class,
            processor: FolderProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class FolderResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read', 'write'])]
    public string $name;

    #[Groups(['read', 'write'])]
    public string $mimeType;

    #[Groups(['read', 'write'])]
    public ?string $file;

    #[Groups(['read'])]
    public \DateTimeInterface $createdAt;

    #[Groups(['read'])]
    public ?\DateTimeInterface $updatedAt;
}