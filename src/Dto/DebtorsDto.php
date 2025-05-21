<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class DebtorsDto
{
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    #[Groups(['debtors:read', 'debtors:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $crmClientRef = null;

    #[Assert\NotBlank]
    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'receipt_date must be in YYYY-MM-DD format')]
    #[Groups(['debtors:read', 'debtors:write'])]
    #[SerializedName('RECEIPT_DATE')]
    public ?string $receiptDate = null;

    #[Assert\Length(max: 255)]
    #[Groups(['debtors:read', 'debtors:write'])]
    #[SerializedName('TRANSACT')]
    public ?string $transact = null;

    #[Assert\Length(max: 255)]
    #[Groups(['debtors:read', 'debtors:write'])]
    #[SerializedName('POLICY_NUM')]
    public ?string $policyNum = null;

    #[Assert\Length(max: 255)]
    #[Groups(['debtors:read', 'debtors:write'])]
    #[SerializedName('PLACING_NUM')]
    public ?string $placingNum = null;

    #[Assert\Length(max: 255)]
    #[Groups(['debtors:read', 'debtors:write'])]
    #[SerializedName('RECEIPT_NUM')]
    public ?string $receiptNum = null;

    #[Assert\Length(max: 255)]
    #[Groups(['debtors:read', 'debtors:write'])]
    #[SerializedName('MODE_OF_PAYMENT')]
    public ?string $modeOfPayment = null;

    #[Assert\Length(max: 255)]
    #[Groups(['debtors:read', 'debtors:write'])]
    #[SerializedName('Transaction_Ref')]
    public ?string $transactionRef = null;

    #[Assert\NotBlank]
    #[Assert\PositiveOrZero]
    #[Groups(['debtors:read', 'debtors:write'])]
    #[SerializedName('Amount')]
    public ?float $amount = null;

    #[Assert\Length(max: 255)]
    #[Groups(['debtors:read', 'debtors:write'])]
    #[SerializedName('CLIENT_NAME')]
    public ?string $clientName = null;
}