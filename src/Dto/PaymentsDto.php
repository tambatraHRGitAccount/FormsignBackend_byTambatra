<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class PaymentsDto
{
    #[Assert\Length(max: 255)]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('POLICY_NUM')]
    public ?string $policyNum = null;

    #[Assert\Length(max: 255)]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('SwanClientRef')]
    public ?string $swanClientRef = null;

    #[Assert\Length(max: 255)]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('ACC_MONTH')]
    public ?string $accMonth = null;

    #[Assert\Length(max: 255)]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('ACC_YEAR')]
    public ?string $accYear = null;

    #[Assert\Length(max: 255)]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('PLACING_NUMBER')]
    public ?string $placingNumber = null;

    #[Assert\Length(max: 255)]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('PAYMENT_NUMBER')]
    public ?string $paymentNumber = null;

    #[Assert\Length(max: 255)]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('MODE_OF_PAYMENT')]
    public ?string $modeOfPayment = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'DUE_DATE must be in YYYY-MM-DD format')]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('DUE_DATE')]
    public ?string $dueDate = null;

    #[Assert\PositiveOrZero]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('AMOUNT_DUE')]
    public ?float $amountDue = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'PAID_DATE must be in YYYY-MM-DD format')]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('PAID_DATE')]
    public ?string $paidDate = null;

    #[Assert\PositiveOrZero]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('AMOUNT_PAID')]
    public ?float $amountPaid = null;

    #[Assert\Length(max: 255)]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $crmClientRef = null;

    #[Assert\Length(max: 255)]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('Transaction')]
    public ?string $transaction = null;

    #[Assert\Length(max: 255)]
    #[Groups(['payments:read', 'payments:write'])]
    #[SerializedName('QB_INV_NUM')]
    public ?string $qbInvNum = null;
}