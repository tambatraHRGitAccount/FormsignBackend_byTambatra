<?php

namespace App\ApiResource;

use App\Dto\SignatureSettingDto;
use App\State\SignatureSettingState;
use App\State\SignatureSettingProcessor;
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
            provider: SignatureSettingState::class
        ),
        new GetCollection(
            provider: SignatureSettingState::class
        ),
        new Post(
            input: SignatureSettingDto::class,
            processor: SignatureSettingProcessor::class
        ),
        new Patch(
            input: SignatureSettingDto::class,
            processor: SignatureSettingProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class SignatureSettingResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read'])]
    public string $documentId;

    #[Groups(['read', 'write'])]
    public int $page;

    #[Groups(['read', 'write'])]
    public int $x;

    #[Groups(['read', 'write'])]
    public int $y;

    #[Groups(['read', 'write'])]
    public int $height;

    #[Groups(['read', 'write'])]
    public int $width;
}