<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\Table(name: 'signers')]
class Signer
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: SignatureRequest::class)]
    #[ORM\JoinColumn(name: 'signature_request_id', referencedColumnName: 'id', nullable: false)]
    private SignatureRequest $signatureRequest;

    #[ORM\ManyToOne(targetEntity: Signer::class)]
    #[ORM\JoinColumn(name: 'insert_after_id', referencedColumnName: 'id', nullable: true)]
    private ?Signer $insertAfter = null;

    #[ORM\Column(type: 'string', length: 100)]
    private string $firstName;

    #[ORM\Column(type: 'string', length: 100)]
    private string $lastName;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private string $email;

    #[ORM\Column(type: 'string', length: 20)]
    private string $phoneNumber;

    #[ORM\Column(type: 'string', length: 50)]
    private string $signatureAuthenticationMode;

    #[ORM\Column(type: 'boolean')]
    private bool $hasSigned = false;

    #[ORM\Column(type: 'string', length: 45)]
    private string $ipAddress;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $authenticationDatetime = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $signatureDatetime = null;

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

    public function getInsertAfter(): ?Signer
    {
        return $this->insertAfter;
    }

    public function setInsertAfter(?Signer $insertAfter): self
    {
        $this->insertAfter = $insertAfter;
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

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
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

    public function hasSigned(): bool
    {
        return $this->hasSigned;
    }

    public function setHasSigned(bool $hasSigned): self
    {
        $this->hasSigned = $hasSigned;
        return $this;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress): self
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

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }
}