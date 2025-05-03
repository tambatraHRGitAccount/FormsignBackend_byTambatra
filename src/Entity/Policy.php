<?php

namespace App\Entity;

use App\Enum\InsuranceType;
use App\Enum\ModeOfPayment;
use App\Enum\TransactionType;
use App\Repository\PolicyRepository;
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

#[ORM\Entity(repositoryClass: PolicyRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => ['policy:read']]),
        new GetCollection(normalizationContext: ['groups' => ['policy:read']]),
        new Post(denormalizationContext: ['groups' => ['policy:write']]),
        new Put(denormalizationContext: ['groups' => ['policy:write']]),
        new Delete(),
    ]
)]
class Policy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['policy:read'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?\DateTimeInterface $accMonth = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?int $placingNumber = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?int $qbNumber = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?int $policyNumber = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?\DateTimeInterface $dateFrom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\NotBlank]
    private ?\DateTimeInterface $dateTo = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\Length(max: 255)]
    private ?string $makeAndModel = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\Length(max: 255)]
    private ?string $hp = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\Length(max: 255)]
    private ?string $bodyType = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?int $month = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?int $year = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?int $registrationNumber = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?string $sumInsured = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?string $excess = null;

    #[ORM\Column(length: 500, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\Length(max: 500)]
    private ?string $riskDescription = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?bool $driverAtFault = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?bool $notAtFaultExcess = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?bool $aic = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?bool $rodent = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?bool $lossOfUse = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?bool $passiveTerrorism = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?bool $alloyWheel = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?string $netPremium = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?string $rate = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\PositiveOrZero]
    private ?string $grossPremium = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\Length(max: 255)]
    private ?string $leasing = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['policy:read', 'policy:write'])]
    #[Assert\Length(max: 255)]
    private ?string $lien = null;

    #[ORM\Column(nullable: true, enumType: TransactionType::class)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?TransactionType $transactionType = null;

    #[ORM\Column(nullable: true, enumType: InsuranceType::class)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?InsuranceType $insuranceType = null;

    #[ORM\Column(nullable: true, enumType: ModeOfPayment::class)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?ModeOfPayment $modeOfPayment = null;

    #[ORM\ManyToOne(targetEntity: PolicyCoverType::class)]
    #[Groups(['policy:read', 'policy:write'])]
    private ?PolicyCoverType $coverType = null;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(name: 'customer_id', referencedColumnName: 'id')]
    #[Groups(['policy:read'])]
    private ?Customer $customer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getAccMonth(): ?\DateTimeInterface
    {
        return $this->accMonth;
    }

    public function setAccMonth(?\DateTimeInterface $accMonth): static
    {
        $this->accMonth = $accMonth;
        return $this;
    }

    public function getPlacingNumber(): ?int
    {
        return $this->placingNumber;
    }

    public function setPlacingNumber(?int $placingNumber): static
    {
        $this->placingNumber = $placingNumber;
        return $this;
    }

    public function getQbNumber(): ?int
    {
        return $this->qbNumber;
    }

    public function setQbNumber(?int $qbNumber): static
    {
        $this->qbNumber = $qbNumber;
        return $this;
    }

    public function getPolicyNumber(): ?int
    {
        return $this->policyNumber;
    }

    public function setPolicyNumber(?int $policyNumber): static
    {
        $this->policyNumber = $policyNumber;
        return $this;
    }

    public function getDateFrom(): ?\DateTimeInterface
    {
        return $this->dateFrom;
    }

    public function setDateFrom(?\DateTimeInterface $dateFrom): static
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    public function getDateTo(): ?\DateTimeInterface
    {
        return $this->dateTo;
    }

    public function setDateTo(\DateTimeInterface $dateTo): static
    {
        $this->dateTo = $dateTo;
        return $this;
    }

    public function getMakeAndModel(): ?string
    {
        return $this->makeAndModel;
    }

    public function setMakeAndModel(?string $makeAndModel): static
    {
        $this->makeAndModel = $makeAndModel;
        return $this;
    }

    public function getHp(): ?string
    {
        return $this->hp;
    }

    public function setHp(?string $hp): static
    {
        $this->hp = $hp;
        return $this;
    }

    public function getBodyType(): ?string
    {
        return $this->bodyType;
    }

    public function setBodyType(?string $bodyType): static
    {
        $this->bodyType = $bodyType;
        return $this;
    }

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function setMonth(?int $month): static
    {
        $this->month = $month;
        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): static
    {
        $this->year = $year;
        return $this;
    }

    public function getRegistrationNumber(): ?int
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(?int $registrationNumber): static
    {
        $this->registrationNumber = $registrationNumber;
        return $this;
    }

    public function getSumInsured(): ?string
    {
        return $this->sumInsured;
    }

    public function setSumInsured(?string $sumInsured): static
    {
        $this->sumInsured = $sumInsured;
        return $this;
    }

    public function getExcess(): ?string
    {
        return $this->excess;
    }

    public function setExcess(?string $excess): static
    {
        $this->excess = $excess;
        return $this;
    }

    public function getRiskDescription(): ?string
    {
        return $this->riskDescription;
    }

    public function setRiskDescription(?string $riskDescription): static
    {
        $this->riskDescription = $riskDescription;
        return $this;
    }

    public function isDriverAtFault(): ?bool
    {
        return $this->driverAtFault;
    }

    public function setDriverAtFault(?bool $driverAtFault): static
    {
        $this->driverAtFault = $driverAtFault;
        return $this;
    }

    public function isNotAtFaultExcess(): ?bool
    {
        return $this->notAtFaultExcess;
    }

    public function setNotAtFaultExcess(?bool $notAtFaultExcess): static
    {
        $this->notAtFaultExcess = $notAtFaultExcess;
        return $this;
    }

    public function isAic(): ?bool
    {
        return $this->aic;
    }

    public function setAic(?bool $aic): static
    {
        $this->aic = $aic;
        return $this;
    }

    public function isRodent(): ?bool
    {
        return $this->rodent;
    }

    public function setRodent(?bool $rodent): static
    {
        $this->rodent = $rodent;
        return $this;
    }

    public function isLossOfUse(): ?bool
    {
        return $this->lossOfUse;
    }

    public function setLossOfUse(?bool $lossOfUse): static
    {
        $this->lossOfUse = $lossOfUse;
        return $this;
    }

    public function isPassiveTerrorism(): ?bool
    {
        return $this->passiveTerrorism;
    }

    public function setPassiveTerrorism(?bool $passiveTerrorism): static
    {
        $this->passiveTerrorism = $passiveTerrorism;
        return $this;
    }

    public function isAlloyWheel(): ?bool
    {
        return $this->alloyWheel;
    }

    public function setAlloyWheel(?bool $alloyWheel): static
    {
        $this->alloyWheel = $alloyWheel;
        return $this;
    }

    public function getNetPremium(): ?string
    {
        return $this->netPremium;
    }

    public function setNetPremium(?string $netPremium): static
    {
        $this->netPremium = $netPremium;
        return $this;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function setRate(?string $rate): static
    {
        $this->rate = $rate;
        return $this;
    }

    public function getGrossPremium(): ?string
    {
        return $this->grossPremium;
    }

    public function setGrossPremium(?string $grossPremium): static
    {
        $this->grossPremium = $grossPremium;
        return $this;
    }

    public function getLeasing(): ?string
    {
        return $this->leasing;
    }

    public function setLeasing(?string $leasing): static
    {
        $this->leasing = $leasing;
        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): static
    {
        $this->lien = $lien;
        return $this;
    }

    public function getTransactionType(): ?TransactionType
    {
        return $this->transactionType;
    }

    public function setTransactionType(?TransactionType $transactionType): static
    {
        $this->transactionType = $transactionType;
        return $this;
    }

    public function getInsuranceType(): ?InsuranceType
    {
        return $this->insuranceType;
    }

    public function setInsuranceType(?InsuranceType $insuranceType): static
    {
        $this->insuranceType = $insuranceType;
        return $this;
    }

    public function getModeOfPayment(): ?ModeOfPayment
    {
        return $this->modeOfPayment;
    }

    public function setModeOfPayment(?ModeOfPayment $modeOfPayment): static
    {
        $this->modeOfPayment = $modeOfPayment;
        return $this;
    }

    public function getCoverType(): ?PolicyCoverType
    {
        return $this->coverType;
    }

    public function setCoverType(?PolicyCoverType $coverType): static
    {
        $this->coverType = $coverType;
        return $this;
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
}