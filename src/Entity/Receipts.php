<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\ReceiptsDto;
use App\State\ReceiptsProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'receipts')]
#[ApiResource(
    operations: [
        new Get(
            output: ReceiptsDto::class
        ),
        new GetCollection(
            output: ReceiptsDto::class
        ),
        new Post(
            input: ReceiptsDto::class,
            output: ReceiptsDto::class,
            processor: ReceiptsProcessor::class
        ),
        new Put(
            input: ReceiptsDto::class,
            output: ReceiptsDto::class,
            processor: ReceiptsProcessor::class,
            denormalizationContext: ['groups' => ['receipts:write', 'receipts:put:write']]
        ),
        new Delete(
            processor: ReceiptsProcessor::class
        ),  
    ],
    normalizationContext: ['groups' => ['receipts:read']],
    denormalizationContext: ['groups' => ['receipts:write']]
)]
class Receipts
{
    #[ORM\Id]
    #[ORM\Column(type: 'bigint')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CRMClientRef')]
    private ?string $crmClientRef = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'RECEIPT_NUM', unique: true)]
    private ?string $receiptNum = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'RECEIPT_DATE')]
    private ?\DateTimeInterface $receiptDate = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Amount_in_letter')]
    private ?string $amountInLetter = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'Amount_in_Numbers')]
    private ?float $amountInNumbers = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'DATE_FROM')]
    private ?\DateTimeInterface $dateFrom = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'DATE_TO')]
    private ?\DateTimeInterface $dateTo = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'REGISTRATION_NUMBER')]
    private ?string $registrationNumber = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'POLICY_NUM')]
    private ?string $policyNum = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'MODE_OF_PAYMENT')]
    private ?string $modeOfPayment = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'BANK_CHEQUE_NUM')]
    private ?string $bankChequeNum = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'REMARKS')]
    private ?string $remarks = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CLIENT_NAME')]
    private ?string $clientName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'LOGDMENT')]
    private ?string $logdment = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'LODGMENT_DATE')]
    private ?\DateTimeInterface $lodgmentDate = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Field16')]
    private ?string $field16 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'QB_INV_NUM')]
    private ?string $qbInvNum = null;

    // Getters and Setters
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

    public function getReceiptNum(): ?string
    {
        return $this->receiptNum;
    }

    public function setReceiptNum(?string $receiptNum): self
    {
        $this->receiptNum = $receiptNum;
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

    public function getAmountInLetter(): ?string
    {
        return $this->amountInLetter;
    }

    public function setAmountInLetter(?string $amountInLetter): self
    {
        $this->amountInLetter = $amountInLetter;
        return $this;
    }

    public function getAmountInNumbers(): ?float
    {
        return $this->amountInNumbers;
    }

    public function setAmountInNumbers(?float $amountInNumbers): self
    {
        $this->amountInNumbers = $amountInNumbers;
        return $this;
    }

    public function getDateFrom(): ?\DateTimeInterface
    {
        return $this->dateFrom;
    }

    public function setDateFrom(?\DateTimeInterface $dateFrom): self
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    public function getDateTo(): ?\DateTimeInterface
    {
        return $this->dateTo;
    }

    public function setDateTo(?\DateTimeInterface $dateTo): self
    {
        $this->dateTo = $dateTo;
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

    public function getPolicyNum(): ?string
    {
        return $this->policyNum;
    }

    public function setPolicyNum(?string $policyNum): self
    {
        $this->policyNum = $policyNum;
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

    public function getBankChequeNum(): ?string
    {
        return $this->bankChequeNum;
    }

    public function setBankChequeNum(?string $bankChequeNum): self
    {
        $this->bankChequeNum = $bankChequeNum;
        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(?string $remarks): self
    {
        $this->remarks = $remarks;
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

    public function getLogdment(): ?string
    {
        return $this->logdment;
    }

    public function setLogdment(?string $logdment): self
    {
        $this->logdment = $logdment;
        return $this;
    }

    public function getLodgmentDate(): ?\DateTimeInterface
    {
        return $this->lodgmentDate;
    }

    public function setLodgmentDate(?\DateTimeInterface $lodgmentDate): self
    {
        $this->lodgmentDate = $lodgmentDate;
        return $this;
    }

    public function getField16(): ?string
    {
        return $this->field16;
    }

    public function setField16(?string $field16): self
    {
        $this->field16 = $field16;
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