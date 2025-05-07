<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'debtors')]
class Debtors
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Clients::class, inversedBy: 'debtors')]
    #[ORM\JoinColumn(name: 'CRMClientRef', referencedColumnName: 'crmClientRef', nullable: false, onDelete: 'CASCADE')]
    private ?Clients $client = null;

    #[ORM\ManyToOne(targetEntity: Policies::class, inversedBy: 'debtors')]
    #[ORM\JoinColumn(name: 'POLICY_NUM', referencedColumnName: 'policy', nullable: false, onDelete: 'CASCADE')]
    private ?Policies $policy = null;

    #[ORM\ManyToOne(targetEntity: Policies::class)]
    #[ORM\JoinColumn(name: 'PLACING_NUM', referencedColumnName: 'placingNumber', nullable: true, onDelete: 'SET NULL')]
    private ?Policies $placingPolicy = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $receiptDate = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $transact = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $receiptNum = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $modeOfPayment = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $transactionRef = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $amount = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $clientName = null;

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

    public function getReceiptDate(): ?float
    {
        return $this->receiptDate;
    }

    public function setReceiptDate(?float $receiptDate): self
    {
        $this->receiptDate = $receiptDate;
        return $this;
    }

    public function getTransact(): ?string
    {
        return $this->transact;
    }

    public function setTransact(?string $transact): self
    {
        $this->transact = $transact;
        return $this;
    }

    public function getReceiptNum(): ?string
    {
        return $this->receiptNum;
    }

    public function setReceiptNum(?string $receiptNum): self
    {
        $this->receiptNum = $receiptNum;
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

    public function getTransactionRef(): ?string
    {
        return $this->transactionRef;
    }

    public function setTransactionRef(?string $transactionRef): self
    {
        $this->transactionRef = $transactionRef;
        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getClientName(): ?string
    {
        return $this->clientName;
    }

    public function setClientName(?string $clientName): self
    {
        $this->clientName = $clientName;
        return $this;
    }
}