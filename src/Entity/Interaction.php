<?php

namespace App\Entity;

use App\Enum\RequestOrigin;
use App\Enum\OperationType;
use App\Enum\FollowUpStatus;
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
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => ['interaction:read']]),
        new GetCollection(normalizationContext: ['groups' => ['interaction:read']]),
        new Post(denormalizationContext: ['groups' => ['interaction:write']]),
        new Put(denormalizationContext: ['groups' => ['interaction:write']]),
        new Delete(),
    ],
    normalizationContext: ['groups' => ['interaction:read']],
    denormalizationContext: ['groups' => ['interaction:write']],
    paginationItemsPerPage: 10
)]
class Interaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['interaction:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(name: 'customer_id', referencedColumnName: 'id', nullable: false)]
    #[Groups(['interaction:read', 'interaction:write'])]
    #[Assert\NotNull(message: 'Le client est requis')]
    private ?Customer $customer = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['interaction:read', 'interaction:write'])]
    #[Assert\NotBlank(message: 'La date du RDV est requise')]
    private ?\DateTimeInterface $dateRdv = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['interaction:read', 'interaction:write'])]
    private ?string $comment = null;

    #[ORM\Column(enumType: RequestOrigin::class)]
    #[Groups(['interaction:read', 'interaction:write'])]
    #[Assert\NotBlank(message: "L'origine de la requête est requise")]
    private ?RequestOrigin $requestOrigin = null;

    #[ORM\Column(enumType: OperationType::class)]
    #[Groups(['interaction:read', 'interaction:write'])]
    #[Assert\NotBlank(message: "Le type d'opération est requis")]
    private ?OperationType $operationType = null;

    #[ORM\Column(enumType: FollowUpStatus::class)]
    #[Groups(['interaction:read', 'interaction:write'])]
    #[Assert\NotBlank(message: 'Le statut de suivi est requis')]
    private ?FollowUpStatus $followUpStatus = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['interaction:read'])]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['interaction:read'])]
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

    public function getDateRdv(): ?\DateTimeInterface
    {
        return $this->dateRdv;
    }

    public function setDateRdv(\DateTimeInterface $dateRdv): static
    {
        $this->dateRdv = $dateRdv;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;
        return $this;
    }

    public function getRequestOrigin(): ?RequestOrigin
    {
        return $this->requestOrigin;
    }

    public function setRequestOrigin(?RequestOrigin $requestOrigin): static
    {
        $this->requestOrigin = $requestOrigin;
        return $this;
    }

    public function getOperationType(): ?OperationType
    {
        return $this->operationType;
    }

    public function setOperationType(?OperationType $operationType): static
    {
        $this->operationType = $operationType;
        return $this;
    }

    public function getFollowUpStatus(): ?FollowUpStatus
    {
        return $this->followUpStatus;
    }

    public function setFollowUpStatus(?FollowUpStatus $followUpStatus): static
    {
        $this->followUpStatus = $followUpStatus;
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

    #[Assert\Callback]
    public function validateDateRdv(ExecutionContextInterface $context): void
    {
        if ($this->dateRdv !== null) {
            $today = new \DateTime('today');
            if ($this->dateRdv < $today) {
                $context->buildViolation('La date du RDV ne peut pas être dans le passé')
                    ->atPath('dateRdv')
                    ->addViolation();
            }
        }
    }
}