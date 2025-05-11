<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\PaymentsDto;
use App\State\PaymentsProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'payments')]
#[ApiResource(
    operations: [
        new Get(
            output: PaymentsDto::class
        ),
        new GetCollection(
            output: PaymentsDto::class
        ),
        new Post(
            input: PaymentsDto::class,
            output: PaymentsDto::class,
            processor: PaymentsProcessor::class
        ),
        new Put(
            input: PaymentsDto::class,
            output: PaymentsDto::class,
            processor: PaymentsProcessor::class
        ),
        new Delete(
            processor: PaymentsProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['payments:read']],
    denormalizationContext: ['groups' => ['payments:write']]
)]
class Payments
{
    #[ORM\Id]
    #[ORM\Column(type: 'bigint')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'POLICY_NUM')]
    private ?string $policyNum = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'SwanClientRef')]
    private ?string $swanClientRef = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'ACC_MONTH')]
    private ?string $accMonth = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'ACC_YEAR')]
    private ?string $accYear = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'PLACING_NUMBER')]
    private ?string $placingNumber = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'PAYMENT_NUMBER')]
    private ?string $paymentNumber = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'MODE_OF_PAYMENT')]
    private ?string $modeOfPayment = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'DUE_DATE')]
    private ?\DateTimeInterface $dueDate = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'AMOUNT_DUE')]
    private ?float $amountDue = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'PAID_DATE')]
    private ?\DateTimeInterface $paidDate = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'AMOUNT_PAID')]
    private ?float $amountPaid = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CRMClientRef')]
    private ?string $crmClientRef = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Transaction')]
    private ?string $transaction = null;

    // Getters and Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPolicyNum(): ?string
    {
        return $this->policyNum;
    }

    public function setPolicyNum(?string $policyNum): self
    {
        $this->policyNum = $policyNum;
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

    public function getAccMonth(): ?string
    {
        return $this->accMonth;
    }

    public function setAccMonth(?string $accMonth): self
    {
        $this->accMonth = $accMonth;
        return $this;
    }

    public function getAccYear(): ?string
    {
        return $this->accYear;
    }

    public function setAccYear(?string $accYear): self
    {
        $this->accYear = $accYear;
        return $this;
    }

    public function getPlacingNumber(): ?string
    {
        return $this->placingNumber;
    }

    public function setPlacingNumber(?string $placingNumber): self
    {
        $this->placingNumber = $placingNumber;
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

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTimeInterface $dueDate): self
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

    public function getPaidDate(): ?\DateTimeInterface
    {
        return $this->paidDate;
    }

    public function setPaidDate(?\DateTimeInterface $paidDate): self
    {
        $this->paidDate = $paidDate;
        return $this;
    }

    public function getAmountPaid(): ?float
    {
        return $this->amountPaid;
    }

    public function setAmountPaid(?float $amountPaid): self
    {
        $this->amountPaid = $amountPaid;
        return $this;
    }

    public function getCrmClientRef(): ?string
    {
        return $this->crmClientRef;
    }

    public function setCrmClientRef(?string $crmClientRef): self
    {
        $this->crmClientRef = $crmClientRef;
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