<?php

namespace App\ApiResource;

use App\Dto\SignerDto;
use App\State\SignerProcessor;
use App\State\SignerState;
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
            uriTemplate: '/signers/{id}',
            provider: SignerState::class
        ),
        new GetCollection(
            uriTemplate: '/signers',
            provider: SignerState::class
        ),
        new Post(
            uriTemplate: '/signature_request/{id}/signer',
            input: SignerDto::class,
            processor: SignerProcessor::class,
            name: 'create_signer'
        ),
        new Patch(
            input: SignerDto::class,
            processor: SignerProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class SignerResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read'])]
    public string $signatureRequestId;

    #[Groups(['read', 'write'])]
    public string $firstName;

    #[Groups(['read', 'write'])]
    public string $lastName;

    #[Groups(['read', 'write'])]
    public string $email;

    #[Groups(['read', 'write'])]
    public ?string $phoneNumber;

    #[Groups(['read', 'write'])]
    public string $signatureAuthenticationMode;

    #[Groups(['read', 'write'])]
    public ?string $insertAfterId;

    #[Groups(['read', 'write'])]
    public ?string $smsMessage;

    #[Groups(['read', 'write'])]
    public bool $hasSigned;

    #[Groups(['read', 'write'])]
    public ?string $ipAddress;

    #[Groups(['read', 'write'])]
    public ?\DateTimeInterface $authenticationDatetime;

    #[Groups(['read', 'write'])]
    public ?\DateTimeInterface $signatureDatetime;

    #[Groups(['read', 'write'])]
    public string $status;

    #[Groups(['read'])]
    public \DateTimeInterface $createdAt;

    #[Groups(['read'])]
    public ?\DateTimeInterface $updatedAt;
}