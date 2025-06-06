<?php

namespace App\ApiResource;

use App\Dto\SignatureRequestDto;
use App\Dto\SignerDto;
use App\Dto\DocumentDto;
use App\State\SignatureRequestState;
use App\State\SignatureRequestProcessor;
use App\State\SignerProcessor;
use App\State\DocumentProcessor;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
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
            uriTemplate: '/signature_request',
            input: SignatureRequestDto::class,
            processor: SignatureRequestProcessor::class
        ),
        new Patch(
            input: SignatureRequestDto::class,
            processor: SignatureRequestProcessor::class
        ),
        new Delete(),
        new Post(
            uriTemplate: '/signature_request/{id}/activate',
            processor: SignatureRequestProcessor::class,
            name: 'activate_signature_request'
        ),
        new Post(
            uriTemplate: '/signature_request/{id}/signer',
            input: SignerDto::class,
            processor: SignerProcessor::class,
            name: 'add_signer_to_signature_request'
        ),
        new Post(
            uriTemplate: '/signature_request/{id}/document',
            input: DocumentDto::class,
            processor: DocumentProcessor::class,
            name: 'add_document_to_signature_request'
        )
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
    public string $name;

    #[Groups(['read', 'write'])]
    public ?array $email;

    #[Groups(['read', 'write'])]
    public ?\DateTimeInterface $expirationDate;

    #[Groups(['read', 'write'])]
    public string $timezone;

    #[Groups(['read', 'write'])]
    public bool $signersAllowedToDecline;

    #[Groups(['read', 'write'])]
    public string $status;

    #[Groups(['read', 'write'])]
    public array $reminderSettings;

    #[Groups(['read', 'write'])]
    public array $webhooks;

    #[Groups(['read', 'write'])]
    public array $auditEvents;

    #[Groups(['read'])]
    public \DateTimeInterface $createdAt;

    #[Groups(['read'])]
    public ?\DateTimeInterface $updatedAt;

    #[Groups(['read'])]
    public array $documents;

    #[Groups(['read'])]
    public array $signers;
}