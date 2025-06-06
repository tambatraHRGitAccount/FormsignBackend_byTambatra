<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'signers')]
class Signer
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: SignatureRequest::class, inversedBy: 'signers')]
    #[ORM\JoinColumn(nullable: false)]
    private SignatureRequest $signatureRequest;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank]
    private string $firstName;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank]
    private string $lastName;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private string $email;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $signatureAuthenticationMode = 'email';

    #[ORM\Column(type: 'string', length: 36, nullable: true)]
    private ?string $insertAfterId = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $smsMessage = null;

    #[ORM\Column(type: 'boolean')]
    private bool $hasSigned = false;

    #[ORM\Column(type: 'string', length: 45, nullable: true)]
    private ?string $ipAddress = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $authenticationDatetime = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $signatureDatetime = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $status = 'pending';

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

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getSignatureAuthenticationMode(): string
    {
        return $this->signatureAuthenticationMode;
    }

    public function setSignatureAuthenticationMode(string $signatureAuthenticationMode): self
    {
        $this->signatureAuthenticationMode = $signatureAuthenticationMode;
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

    public function getSmsMessage(): ?string
    {
        return $this->smsMessage;
    }

    public function setSmsMessage(?string $smsMessage): self
    {
        $this->smsMessage = $smsMessage;
        return $this;
    }

    public function hasSigned(): bool
    {
        return $this->hasSigned;
    }

    public function setHasSigned(bool $hasSigned): self
    {
        $this->hasSigned = $hasSigned;
        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function getAuthenticationDatetime(): ?\DateTimeInterface
    {
        return $this->authenticationDatetime;
    }

    public function setAuthenticationDatetime(?\DateTimeInterface $authenticationDatetime): self
    {
        $this->authenticationDatetime = $authenticationDatetime;
        return $this;
    }

    public function getSignatureDatetime(): ?\DateTimeInterface
    {
        return $this->signatureDatetime;
    }

    public function setSignatureDatetime(?\DateTimeInterface $signatureDatetime): self
    {
        $this->signatureDatetime = $signatureDatetime;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
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