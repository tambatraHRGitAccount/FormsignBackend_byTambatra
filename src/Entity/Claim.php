<?php

namespace App\Entity;

use App\Enum\Liability;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => ['claim:read']]),
        new GetCollection(normalizationContext: ['groups' => ['claim:read']]),
        new Post(denormalizationContext: ['groups' => ['claim:write']]),
        new Put(denormalizationContext: ['groups' => ['claim:write']]),
        new Delete(),
    ],
    normalizationContext: ['groups' => ['claim:read']],
    denormalizationContext: ['groups' => ['claim:write']],
    paginationItemsPerPage: 10
)]
class Claim
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['claim:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(name: 'customer_id', referencedColumnName: 'id', nullable: false)]
    #[Groups(['claim:read', 'claim:write'])]
    #[Assert\NotNull(message: 'Le client est requis')]
    private ?Customer $customer = null;

    #[ORM\Column(length: 50)]
    #[Groups(['claim:read', 'claim:write'])]
    #[Assert\NotBlank(message: 'Le numéro de réclamation est requis')]
    #[Assert\Length(max: 50, maxMessage: 'Le numéro de réclamation ne peut pas dépasser 50 caractères')]
    private ?string $claimNo = null;

    #[ORM\Column(length: 50)]
    #[Groups(['claim:read', 'claim:write'])]
    #[Assert\NotBlank(message: "Le numéro d'événement est requis")]
    #[Assert\Length(max: 50, maxMessage: "Le numéro d'événement ne peut pas dépasser 50 caractères")]
    private ?string $occurrence = null;

    #[ORM\Column(length: 50)]
    #[Groups(['claim:read', 'claim:write'])]
    #[Assert\NotBlank(message: "Le numéro d'immatriculation est requis")]
    #[Assert\Length(max: 50, maxMessage: "Le numéro d'immatriculation ne peut pas dépasser 50 caractères")]
    private ?string $registration = null;

    #[ORM\Column(enumType: Liability::class)]
    #[Groups(['claim:read', 'claim:write'])]
    #[Assert\NotBlank(message: 'La responsabilité est requise')]
    private ?Liability $liability = null;

    #[ORM\Column(length: 50)]
    #[Groups(['claim:read', 'claim:write'])]
    #[Assert\NotBlank(message: 'Le statut est requis')]
    #[Assert\Length(max: 50, maxMessage: 'Le statut ne peut pas dépasser 50 caractères')]
    private ?string $status = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['claim:read', 'claim:write'])]
    private ?string $remarks = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Groups(['claim:read', 'claim:write'])]
    #[Assert\Range(
        min: 1900,
        max: 2025,
        notInRangeMessage: "L'année du permis doit être entre 1900 et 2025"
    )]
    private ?int $yearOfLicence = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['claim:read'])]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['claim:read'])]
    private ?\DateTimeInterface $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): static
    {
        $this->customer = $customer;
        return $this;
    }

    public function getClaimNo(): ?string
    {
        return $this->claimNo;
    }

    public function setClaimNo(string $claimNo): static
    {
        $this->claimNo = $claimNo;
        return $this;
    }

    public function getOccurrence(): ?string
    {
        return $this->occurrence;
    }

    public function setOccurrence(string $occurrence): static
    {
        $this->occurrence = $occurrence;
        return $this;
    }

    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    public function setRegistration(string $registration): static
    {
        $this->registration = $registration;
        return $this;
    }

    public function getLiability(): ?Liability
    {
        return $this->liability;
    }

    public function setLiability(?Liability $liability): static
    {
        $this->liability = $liability;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(?string $remarks): static
    {
        $this->remarks = $remarks;
        return $this;
    }

    public function getYearOfLicence(): ?int
    {
        return $this->yearOfLicence;
    }

    public function setYearOfLicence(?int $yearOfLicence): static
    {
        $this->yearOfLicence = $yearOfLicence;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        $this->updatedAt = new \DateTime();
    }
}