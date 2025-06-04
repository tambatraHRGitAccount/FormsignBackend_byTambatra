<?php

namespace App\ApiResource;

use App\Dto\SignatureRequestDto;
use App\State\SignatureRequestState;
use App\State\SignatureRequestProcessor;
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
            provider: SignatureRequestState::class
        ),
        new GetCollection(
            provider: SignatureRequestState::class
        ),
        new Post(
            input: SignatureRequestDto::class,
            processor: SignatureRequestProcessor::class
        ),
        new Patch(
            input: SignatureRequestDto::class,
            processor: SignatureRequestProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class SignatureRequestResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read'])]
    public string $senderId;

    #[Groups(['read'])]
    public ?string $folderId;

    #[Groups(['read', 'write'])]
    public string $emailMessage;

    #[Groups(['read', 'write'])]
    public \DateTimeInterface $expirationDate;

    #[Groups(['read'])]
    public \DateTimeInterface $createdAt;

    #[Groups(['read'])]
    public ?\DateTimeInterface $updatedAt;

    #[Groups(['read', 'write'])]
    public string $name;

    #[Groups(['read', 'write'])]
    public string $timezone;

    #[Groups(['read', 'write'])]
    public bool $signersAllowedToDecline;

    #[Groups(['read', 'write'])]
    public string $status;
}