<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\AppointmentDto;
use App\State\AppointmentProcessor;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
#[ORM\Table(name: 'appointments')]
#[ApiResource(
    operations: [
        new Get(
            output: AppointmentDto::class,
            normalizationContext: ['groups' => ['appointment:read']]
        ),
        new GetCollection(
            output: AppointmentDto::class,
            normalizationContext: ['groups' => ['appointment:read']]
        ),
        new Post(
            input: AppointmentDto::class,
            output: AppointmentDto::class,
            processor: AppointmentProcessor::class,
            denormalizationContext: ['groups' => ['appointment:write']]
        ),
        new Put(
            input: AppointmentDto::class,
            output: AppointmentDto::class,
            processor: AppointmentProcessor::class,
            denormalizationContext: ['groups' => ['appointment:write']]
        ),
        new Delete(
            processor: AppointmentProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['appointment:read']],
    denormalizationContext: ['groups' => ['appointment:write']]
)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['appointment:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Clients::class, inversedBy: 'appointments')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['appointment:read', 'appointment:write'])]
    private ?Clients $client = null;

    #[ORM\Column(type: 'date')]
    #[Groups(['appointment:read', 'appointment:write'])]
    private ?\DateTimeInterface $dateRdv = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['appointment:read', 'appointment:write'])]
    private ?string $comment = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['appointment:read', 'appointment:write'])]
    private ?string $requestOrigin = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['appointment:read', 'appointment:write'])]
    private ?string $operationType = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['appointment:read', 'appointment:write'])]
    private ?string $followUpStatus = null;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['appointment:read'])]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['appointment:read'])]
    private ?\DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;
        return $this;
    }

    public function getDateRdv(): ?\DateTimeInterface
    {
        return $this->dateRdv;
    }

    public function setDateRdv(\DateTimeInterface $dateRdv): self
    {
        $this->dateRdv = $dateRdv;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    public function getRequestOrigin(): ?string
    {
        return $this->requestOrigin;
    }

    public function setRequestOrigin(string $requestOrigin): self
    {
        $this->requestOrigin = $requestOrigin;
        return $this;
    }

    public function getOperationType(): ?string
    {
        return $this->operationType;
    }

    public function setOperationType(string $operationType): self
    {
        $this->operationType = $operationType;
        return $this;
    }

    public function getFollowUpStatus(): ?string
    {
        return $this->followUpStatus;
    }

    public function setFollowUpStatus(string $followUpStatus): self
    {
        $this->followUpStatus = $followUpStatus;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}