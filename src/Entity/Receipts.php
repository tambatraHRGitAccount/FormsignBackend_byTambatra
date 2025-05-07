<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'receipts')]
class Receipts
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Clients::class, inversedBy: 'receipts')]
    #[ORM\JoinColumn(name: 'CRMClientRef', referencedColumnName: 'crmClientRef', nullable: false, onDelete: 'CASCADE')]
    private ?Clients $client = null;

    #[ORM\ManyToOne(targetEntity: Policies::class, inversedBy: 'receipts')]
    #[ORM\JoinColumn(name: 'POLICY_NUM', referencedColumnName: 'policy', nullable: false, onDelete: 'CASCADE')]
    private ?Policies $policy = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $receiptNum = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $receiptDate = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $amountInLetter = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $amountInNumbers = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $dateFrom = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $dateTo = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $registrationNumber = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $modeOfPayment = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $bankChequeNum = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $remarks = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $clientName = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $lodgment = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $lodgmentDate = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $field16 = null;

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

    public function getReceiptNum(): ?string
    {
        return $this->receiptNum;
    }

    public function setReceiptNum(?string $receiptNum): self
    {
        $this->receiptNum = $receiptNum;
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

    public function getDateFrom(): ?string
    {
        return $this->dateFrom;
    }

    public function setDateFrom(?string $dateFrom): self
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    public function getDateTo(): ?string
    {
        return $this->dateTo;
    }

    public function setDateTo(?string $dateTo): self
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

    public function getLodgment(): ?string
    {
        return $this->lodgment;
    }

    public function setLodgment(?string $lodgment): self
    {
        $this->lodgment = $lodgment;
        return $this;
    }

    public function getLodgmentDate(): ?float
    {
        return $this->lodgmentDate;
    }

    public function setLodgmentDate(?float $lodgmentDate): self
    {
        $this->lodgmentDate = $lodgmentDate;
        return $this;
    }

    public function getField16(): ?float
    {
        return $this->field16;
    }

    public function setField16(?float $field16): self
    {
        $this->field16 = $field16;
        return $this;
    }
}