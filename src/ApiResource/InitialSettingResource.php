<?php

namespace App\ApiResource;

use App\Dto\InitialSettingDto;
use App\State\InitialSettingState;
use App\State\InitialSettingProcessor;
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
            provider: InitialSettingState::class
        ),
        new GetCollection(
            provider: InitialSettingState::class
        ),
        new Post(
            input: InitialSettingDto::class,
            processor: InitialSettingProcessor::class
        ),
        new Patch(
            input: InitialSettingDto::class,
            processor: InitialSettingProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class InitialSettingResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read'])]
    public string $documentId;

    #[Groups(['read', 'write'])]
    public string $alignment;

    #[Groups(['read', 'write'])]
    public int $y;
}