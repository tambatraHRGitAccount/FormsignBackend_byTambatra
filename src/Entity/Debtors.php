<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\DebtorsDto;
use App\State\DebtorsProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'debtors')]
#[ApiResource(
    operations: [
        new Get(
            output: DebtorsDto::class
        ),
        new GetCollection(
            output: DebtorsDto::class
        ),
        new Post(
            input: DebtorsDto::class,
            output: DebtorsDto::class,
            processor: DebtorsProcessor::class
        ),
        new Put(
            input: DebtorsDto::class,
            output: DebtorsDto::class,
            processor: DebtorsProcessor::class
        ),
        new Delete(
            processor: DebtorsProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['debtors:read']],
    denormalizationContext: ['groups' => ['debtors:write']]
)]
class Debtors
{
    #[ORM\Id]
    #[ORM\Column(type: 'bigint')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CRMClientRef')]
    private ?string $crmClientRef = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'RECEIPT_DATE')]
    private ?\DateTimeInterface $receiptDate = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TRANSACT')]
    private ?string $transact = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'POLICY_NUM')]
    private ?string $policyNum = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'PLACING_NUM')]
    private ?string $placingNum = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'RECEIPT_NUM')]
    private ?string $receiptNum = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'MODE_OF_PAYMENT')]
    private ?string $modeOfPayment = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Transaction_Ref')]
    private ?string $transactionRef = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'Amount')]
    private ?string $amount = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CLIENT_NAME')]
    private ?string $clientName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'QB_INV_NUM')]
    private ?string $qbInvNum = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getReceiptDate(): ?\DateTimeInterface
    {
        return $this->receiptDate;
    }

    public function setReceiptDate(?\DateTimeInterface $receiptDate): self
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

    public function getPolicyNum(): ?string
    {
        return $this->policyNum;
    }

    public function setPolicyNum(?string $policyNum): self
    {
        $this->policyNum = $policyNum;
        return $this;
    }

    public function getPlacingNum(): ?string
    {
        return $this->placingNum;
    }

    public function setPlacingNum(?string $placingNum): self
    {
        $this->placingNum = $placingNum;
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

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): self
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

    public function getQbInvNum(): ?string
    {
        return $this->qbInvNum;
    }

    public function setQbInvNum(?string $qbInvNum): self
    {
        $this->qbInvNum = $qbInvNum;
        return $this;
    }
}