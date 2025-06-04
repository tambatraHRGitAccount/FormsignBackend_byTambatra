<?php

namespace App\ApiResource;

use App\Dto\UserAccountDto;
use App\State\UserAccountState;
use App\State\UserAccountProcessor;
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
            provider: UserAccountState::class
        ),
        new GetCollection(
            provider: UserAccountState::class
        ),
        new Post(
            input: UserAccountDto::class,
            processor: UserAccountProcessor::class
        ),
        new Patch(
            input: UserAccountDto::class,
            processor: UserAccountProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class UserAccountResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read', 'write'])]
    public string $email;

    #[Groups(['read'])]
    public string $apiToken;

    #[Groups(['read'])]
    public \DateTimeInterface $createdAt;

    #[Groups(['read'])]
    public ?\DateTimeInterface $updatedAt;
}