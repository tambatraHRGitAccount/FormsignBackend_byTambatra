<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'payments')]
class Payments
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Clients::class, inversedBy: 'payments')]
    #[ORM\JoinColumn(name: 'CRMClientRef', referencedColumnName: 'crmClientRef', nullable: false, onDelete: 'CASCADE')]
    private ?Clients $client = null;

    #[ORM\ManyToOne(targetEntity: Policies::class, inversedBy: 'payments')]
    #[ORM\JoinColumn(name: 'POLICY_NUM', referencedColumnName: 'policy', nullable: false, onDelete: 'CASCADE')]
    private ?Policies $policy = null;

    #[ORM\ManyToOne(targetEntity: Policies::class)]
    #[ORM\JoinColumn(name: 'PLACING_NUMBER', referencedColumnName: 'placingNumber', nullable: true, onDelete: 'SET NULL')]
    private ?Policies $placingPolicy = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $accMonth = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $swanClientRef = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $paymentNumber = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $modeOfPayment = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $dueDate = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $amountDue = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $paidDate = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $amountPaid = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $transaction = null;

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

    public function getPolicy(): ?Policies
    {
        return $this->policy;
    }

    public function setPolicy(?Policies $policy): self
    {
        $this->policy = $policy;
        return $this;
    }

    public function getPlacingPolicy(): ?Policies
    {
        return $this->placingPolicy;
    }

    public function setPlacingPolicy(?Policies $placingPolicy): self
    {
        $this->placingPolicy = $placingPolicy;
        return $this;
    }

    public function getAccMonth(): ?float
    {
        return $this->accMonth;
    }

    public function setAccMonth(?float $accMonth): self
    {
        $this->accMonth = $accMonth;
        return $this;
    }

    public function getSwanClientRef(): ?string
    {
        return $this->swanClientRef;
    }

    public function setSwanClientRef(?string $swanClientRef): self
    {
        $this->swanClientRef = $swanClientRef;
        return $this;
    }

    public function getPaymentNumber(): ?string
    {
        return $this->paymentNumber;
    }

    public function setPaymentNumber(?string $paymentNumber): self
    {
        $this->paymentNumber = $paymentNumber;
        return $this;
    }

    public function getModeOfPayment(): ?string
    {
        return $this->modeOfPayment;
    }

    public function setModeOfPayment(?string $modeOfPayment): self
    {
        $this->modeOfPayment = $modeOfPayment;
        return $this;
    }

    public function getDueDate(): ?float
    {
        return $this->dueDate;
    }

    public function setDueDate(?float $dueDate): self
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    public function getAmountDue(): ?float
    {
        return $this->amountDue;
    }

    public function setAmountDue(?float $amountDue): self
    {
        $this->amountDue = $amountDue;
        return $this;
    }

    public function getPaidDate(): ?string
    {
        return $this->paidDate;
    }

    public function setPaidDate(?string $paidDate): self
    {
        $this->paidDate = $paidDate;
        return $this;
    }

    public function getAmountPaid(): ?string
    {
        return $this->amountPaid;
    }

    public function setAmountPaid(?string $amountPaid): self
    {
        $this->amountPaid = $amountPaid;
        return $this;
    }

    public function getTransaction(): ?string
    {
        return $this->transaction;
    }

    public function setTransaction(?string $transaction): self
    {
        $this->transaction = $transaction;
        return $this;
    }
}