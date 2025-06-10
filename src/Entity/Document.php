<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\DocumentController;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\Table(name: 'document')]
#[ApiResource(
    operations: [
        new Post(
            uriTemplate: '/signature_request/{signatureRequestId}/document',
            controller: DocumentController::class.'::uploadDocument',
            inputFormats: ['json' => ['application/json']],
            deserialize: false,
            normalizationContext: ['groups' => ['document:read']],
            denormalizationContext: ['groups' => ['document:write']],
            description: 'Uploads a PDF document in base64 with signature settings for a specific signature request',
            processor: \App\State\DocumentProcessor::class,
            uriVariables: [
                'signatureRequestId' => [
                    'from_class' => SignatureRequest::class,
                    'from_property' => 'id',
                    'description' => 'The ID of the signature request',
                    'required' => true,
                    'openapi' => [
                        'type' => 'string',
                        'format' => 'uuid',
                        'description' => 'UUID of the signature request',
                    ],
                ],
            ],
        ),
    ],
    normalizationContext: ['groups' => ['document:read']],
    denormalizationContext: ['groups' => ['document:write']]
)]
class Document
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Groups(['document:read'])]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['document:read', 'document:write'])]
    private ?string $file = null;

    #[ORM\Column(length: 255)]
    #[Groups(['document:read', 'document:write'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['document:read', 'document:write'])]
    private ?int $insertAfterId = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    #[Groups(['document:read', 'document:write'])]
    private ?array $signatureSettings = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    #[Groups(['document:read', 'document:write'])]
    private ?array $initial = null;

    #[ORM\ManyToOne(targetEntity: SignatureRequest::class, inversedBy: 'documents')]
    #[ORM\JoinColumn(name: 'signature_request_id', referencedColumnName: 'id', nullable: false)]
    #[Groups(['document:read'])]
    private ?SignatureRequest $signatureRequest = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => true])]
    #[Groups(['document:read', 'document:write'])]
    private bool $isSignable = true;

    #[ORM\Column(length: 64, nullable: true)]
    #[Groups(['document:read', 'document:write'])]
    private ?string $signedHash = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getInsertAfterId(): ?int
    {
        return $this->insertAfterId;
    }

    public function setInsertAfterId(int $insertAfterId): self
    {
        $this->insertAfterId = $insertAfterId;
        return $this;
    }

    public function getSignatureSettings(): ?array
    {
        return $this->signatureSettings;
    }

    public function setSignatureSettings(?array $signatureSettings): self
    {
        $this->signatureSettings = $signatureSettings;
        return $this;
    }

    public function getInitial(): ?array
    {
        return $this->initial;
    }

    public function setInitial(?array $initial): self
    {
        $this->initial = $initial;
        return $this;
    }

    public function getSignatureRequest(): ?SignatureRequest
    {
        return $this->signatureRequest;
    }

    public function setSignatureRequest(?SignatureRequest $signatureRequest): self
    {
        $this->signatureRequest = $signatureRequest;
        return $this;
    }

    public function isSignable(): bool
    {
        return $this->isSignable;
    }

    public function setIsSignable(bool $isSignable): self
    {
        $this->isSignable = $isSignable;
        return $this;
    }

    public function getSignedHash(): ?string
    {
        return $this->signedHash;
    }

    public function setSignedHash(?string $signedHash): self
    {
        $this->signedHash = $signedHash;
        return $this;
    }
}