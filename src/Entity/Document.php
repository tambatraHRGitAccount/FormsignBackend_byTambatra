<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\Table(name: 'documents')]
class Document
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: SignatureRequest::class)]
    #[ORM\JoinColumn(name: 'signature_request_id', referencedColumnName: 'id', nullable: false)]
    private SignatureRequest $signatureRequest;

    #[ORM\ManyToOne(targetEntity: Document::class)]
    #[ORM\JoinColumn(name: 'insert_after_id', referencedColumnName: 'id', nullable: true)]
    private ?Document $insertAfter = null;

    #[ORM\Column(type: 'text')]
    private string $file;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'boolean')]
    private bool $isSignable;

    #[ORM\Column(type: 'string', length: 64)]
    private string $initialHash;

    #[ORM\Column(type: 'string', length: 64)]
    private string $signedHash;

    #[ORM\Column(type: 'string', length: 100)]
    private string $mimeType;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;

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

    public function getInsertAfter(): ?Document
    {
        return $this->insertAfter;
    }

    public function setInsertAfter(?Document $insertAfter): self
    {
        $this->insertAfter = $insertAfter;
        return $this;
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;
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

    public function setInitialHash(string $initialHash): self
    {
        $this->initialHash = $initialHash;
        return $this;
    }

    public function getSignedHash(): string
    {
        return $this->signedHash;
    }

    public function setSignedHash(string $signedHash): self
    {
        $this->signedHash = $signedHash;
        return $this;
    }

    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    public function setMimeType(string $mimeType): self
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }
}