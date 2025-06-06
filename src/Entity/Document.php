<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'documents')]
class Document
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: SignatureRequest::class, inversedBy: 'documents')]
    #[ORM\JoinColumn(name: 'signature_request_id', referencedColumnName: 'id', nullable: false)]
    private SignatureRequest $signatureRequest;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $name;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank]
    private string $content;

    #[ORM\Column(type: 'boolean')]
    private bool $isSignable = true;

    #[ORM\Column(type: 'string', length: 64)]
    private string $initialHash;

    #[ORM\Column(type: 'string', length: 64, nullable: true)]
    private ?string $signedHash = null;

    #[ORM\Column(type: 'json', nullable: true)]
    #[Assert\NotNull]
    #[Assert\Type('array')]
    #[Assert\Collection(
        fields: [
            'page' => [new Assert\Type('int'), new Assert\GreaterThanOrEqual(1)],
            'x' => [new Assert\Type('int'), new Assert\GreaterThanOrEqual(0)],
            'y' => [new Assert\Type('int'), new Assert\GreaterThanOrEqual(0)],
            'height' => [new Assert\Type('int'), new Assert\GreaterThan(0)],
            'width' => [new Assert\Type('int'), new Assert\GreaterThan(0)]
        ],
        allowMissingFields: true
    )]
    private ?array $signatureSettings = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $initialSettings = null;

    #[ORM\Column(type: 'string', length: 36, nullable: true)]
    private ?string $insertAfterId = null;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->id = Uuid::v1()->toRfc4122();
        $this->createdAt = new \DateTime();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSignatureRequest(): SignatureRequest
    {
        return $this->signatureRequest;
    }

    public function setSignatureRequest(SignatureRequest $signatureRequest): self
    {
        $this->signatureRequest = $signatureRequest;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        $this->initialHash = hash('sha256', $content);
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

    public function getInitialHash(): string
    {
        return $this->initialHash;
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

    public function getSignatureSettings(): ?array
    {
        return $this->signatureSettings;
    }

    public function setSignatureSettings(?array $signatureSettings): self
    {
        $this->signatureSettings = $signatureSettings;
        return $this;
    }

    public function getInitialSettings(): ?array
    {
        return $this->initialSettings;
    }

    public function setInitialSettings(?array $initialSettings): self
    {
        $this->initialSettings = $initialSettings;
        return $this;
    }

    public function getInsertAfterId(): ?string
    {
        return $this->insertAfterId;
    }

    public function setInsertAfterId(?string $insertAfterId): self
    {
        $this->insertAfterId = $insertAfterId;
        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}