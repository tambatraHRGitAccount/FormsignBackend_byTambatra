<?php

namespace App\Entity;

use App\Enum\PaymentMode;
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
        new Get(normalizationContext: ['groups' => ['receipt:read']]),
        new GetCollection(normalizationContext: ['groups' => ['receipt:read']]),
        new Post(denormalizationContext: ['groups' => ['receipt:write']]),
        new Put(denormalizationContext: ['groups' => ['receipt:write']]),
        new Delete(),
    ],
    normalizationContext: ['groups' => ['receipt:read']],
    denormalizationContext: ['groups' => ['receipt:write']],
    paginationItemsPerPage: 10
)]
class Receipt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['receipt:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(name: 'customer_id', referencedColumnName: 'id', nullable: false)]
    #[Groups(['receipt:read', 'receipt:write'])]
    #[Assert\NotNull(message: 'Le client est requis')]
    private ?Customer $customer = null;

    #[ORM\ManyToOne(targetEntity: Policy::class)]
    #[ORM\JoinColumn(name: 'policy_id', referencedColumnName: 'id', nullable: false)]
    #[Groups(['receipt:read', 'receipt:write'])]
    #[Assert\NotNull(message: 'La police est requise')]
    private ?Policy $policy = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['receipt:read', 'receipt:write'])]
    #[Assert\NotBlank(message: 'La date est requise')]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 50)]
    #[Groups(['receipt:read', 'receipt:write'])]
    #[Assert\NotBlank(message: 'Le numéro du reçu est requis')]
    #[Assert\Length(max: 50, maxMessage: 'Le numéro du reçu ne peut pas dépasser 50 caractères')]
    private ?string $receiptNo = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Groups(['receipt:read', 'receipt:write'])]
    #[Assert\NotBlank(message: 'Le montant est requis')]
    #[Assert\GreaterThan(value: 0, message: 'Le montant doit être supérieur à 0')]
    private ?string $amount = null;

    #[ORM\Column(enumType: PaymentMode::class)]
    #[Groups(['receipt:read', 'receipt:write'])]
    #[Assert\NotBlank(message: 'Le mode de paiement est requis')]
    private ?PaymentMode $mode = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['receipt:read', 'receipt:write'])]
    #[Assert\Length(max: 255, maxMessage: 'La référence de transaction ne peut pas dépasser 255 caractères')]
    private ?string $transRef = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['receipt:read', 'receipt:write'])]
    private ?string $remark = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['receipt:read'])]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['receipt:read'])]
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

    public function getPolicy(): ?Policy
    {
        return $this->policy;
    }

    public function setPolicy(?Policy $policy): static
    {
        $this->policy = $policy;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getReceiptNo(): ?string
    {
        return $this->receiptNo;
    }

    public function setReceiptNo(string $receiptNo): static
    {
        $this->receiptNo = $receiptNo;
        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): static
    {
        $this->amount = $amount;
        return $this;
    }

    public function getMode(): ?PaymentMode
    {
        return $this->mode;
    }

    public function setMode(?PaymentMode $mode): static
    {
        $this->mode = $mode;
        return $this;
    }

    public function getTransRef(): ?string
    {
        return $this->transRef;
    }

    public function setTransRef(?string $transRef): static
    {
        $this->transRef = $transRef;
        return $this;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function setRemark(?string $remark): static
    {
        $this->remark = $remark;
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