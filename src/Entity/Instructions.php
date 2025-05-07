<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'instructions')]
class Instructions
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Clients::class, inversedBy: 'instructions')]
    #[ORM\JoinColumn(name: 'CRMClientRef', referencedColumnName: 'crmClientRef', nullable: false, onDelete: 'CASCADE')]
    private ?Clients $client = null;

    #[ORM\ManyToOne(targetEntity: Policies::class, inversedBy: 'instructions')]
    #[ORM\JoinColumn(name: 'POLICY_NUM', referencedColumnName: 'policy', nullable: false, onDelete: 'CASCADE')]
    private ?Policies $policy = null;

    #[ORM\ManyToOne(targetEntity: Policies::class)]
    #[ORM\JoinColumn(name: 'PLACING_NUMBER', referencedColumnName: 'placingNumber', nullable: true, onDelete: 'SET NULL')]
    private ?Policies $placingPolicy = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $accMonth = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $transact = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $dateFrom = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $dateTo = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $premium = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $fees = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $totalPremium = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $cashCredit = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $registrationNumber = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $indicator = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $policyHolder = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $swanAccMonth = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $swanSerialNum = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $swanPremium = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $remarks1 = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $discrepancy = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $remarks2 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $swanRemarks = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $dtRemarks = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $sentToSwan = null;

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

    public function getAccMonth(): ?string
    {
        return $this->accMonth;
    }

    public function setAccMonth(?string $accMonth): self
    {
        $this->accMonth = $accMonth;
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

    public function getDateFrom(): ?float
    {
        return $this->dateFrom;
    }

    public function setDateFrom(?float $dateFrom): self
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    public function getDateTo(): ?float
    {
        return $this->dateTo;
    }

    public function setDateTo(?float $dateTo): self
    {
        $this->dateTo = $dateTo;
        return $this;
    }

    public function getPremium(): ?float
    {
        return $this->premium;
    }

    public function setPremium(?float $premium): self
    {
        $this->premium = $premium;
        return $this;
    }

    public function getFees(): ?float
    {
        return $this->fees;
    }

    public function setFees(?float $fees): self
    {
        $this->fees = $fees;
        return $this;
    }

    public function getTotalPremium(): ?float
    {
        return $this->totalPremium;
    }

    public function setTotalPremium(?float $totalPremium): self
    {
        $this->totalPremium = $totalPremium;
        return $this;
    }

    public function getCashCredit(): ?string
    {
        return $this->cashCredit;
    }

    public function setCashCredit(?string $cashCredit): self
    {
        $this->cashCredit = $cashCredit;
        return $this;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(?string $registrationNumber): self
    {
        $this->registrationNumber = $registrationNumber;
        return $this;
    }

    public function getIndicator(): ?string
    {
        return $this->indicator;
    }

    public function setIndicator(?string $indicator): self
    {
        $this->indicator = $indicator;
        return $this;
    }

    public function getPolicyHolder(): ?string
    {
        return $this->policyHolder;
    }

    public function setPolicyHolder(?string $policyHolder): self
    {
        $this->policyHolder = $policyHolder;
        return $this;
    }

    public function getSwanAccMonth(): ?string
    {
        return $this->swanAccMonth;
    }

    public function setSwanAccMonth(?string $swanAccMonth): self
    {
        $this->swanAccMonth = $swanAccMonth;
        return $this;
    }

    public function getSwanSerialNum(): ?float
    {
        return $this->swanSerialNum;
    }

    public function setSwanSerialNum(?float $swanSerialNum): self
    {
        $this->swanSerialNum = $swanSerialNum;
        return $this;
    }

    public function getSwanPremium(): ?float
    {
        return $this->swanPremium;
    }

    public function setSwanPremium(?float $swanPremium): self
    {
        $this->swanPremium = $swanPremium;
        return $this;
    }

    public function getRemarks1(): ?string
    {
        return $this->remarks1;
    }

    public function setRemarks1(?string $remarks1): self
    {
        $this->remarks1 = $remarks1;
        return $this;
    }

    public function getDiscrepancy(): ?float
    {
        return $this->discrepancy;
    }

    public function setDiscrepancy(?float $discrepancy): self
    {
        $this->discrepancy = $discrepancy;
        return $this;
    }

    public function getRemarks2(): ?string
    {
        return $this->remarks2;
    }

    public function setRemarks2(?string $remarks2): self
    {
        $this->remarks2 = $remarks2;
        return $this;
    }

    public function getSwanRemarks(): ?string
    {
        return $this->swanRemarks;
    }

    public function setSwanRemarks(?string $swanRemarks): self
    {
        $this->swanRemarks = $swanRemarks;
        return $this;
    }

    public function getDtRemarks(): ?string
    {
        return $this->dtRemarks;
    }

    public function setDtRemarks(?string $dtRemarks): self
    {
        $this->dtRemarks = $dtRemarks;
        return $this;
    }

    public function getSentToSwan(): ?string
    {
        return $this->sentToSwan;
    }

    public function setSentToSwan(?string $sentToSwan): self
    {
        $this->sentToSwan = $sentToSwan;
        return $this;
    }
}