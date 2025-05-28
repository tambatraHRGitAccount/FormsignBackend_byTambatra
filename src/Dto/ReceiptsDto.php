<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class ReceiptsDto
{
    #[Assert\Length(max: 255, maxMessage: 'CRMClientRef cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $crmClientRef = null;

    #[Assert\Length(max: 255, maxMessage: 'RECEIPT_NUM cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:put:write'])] // Add receipts:put:write for PUT operations
    #[SerializedName('RECEIPT_NUM')]
    public ?string $receiptNum = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'RECEIPT_DATE must be in YYYY-MM-DD format')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('RECEIPT_DATE')]
    public ?string $receiptDate = null;

    #[Assert\Length(max: 255, maxMessage: 'Amount_in_letter cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('Amount_in_letter')]
    public ?string $amountInLetter = null;

    #[Assert\PositiveOrZero(message: 'Amount_in_Numbers must be a positive number or zero')]
    #[Assert\NotBlank(message: 'Amount_in_Numbers cannot be blank')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('Amount_in_Numbers')]
    public ?float $amountInNumbers = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'DATE_FROM must be in YYYY-MM-DD format')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('DATE_FROM')]
    public ?string $dateFrom = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'DATE_TO must be in YYYY-MM-DD format')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('DATE_TO')]
    public ?string $dateTo = null;

    #[Assert\Length(max: 255, maxMessage: 'REGISTRATION_NUMBER cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('REGISTRATION_NUMBER')]
    public ?string $registrationNumber = null;

    #[Assert\Length(max: 255, maxMessage: 'POLICY_NUM cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('POLICY_NUM')]
    public ?string $policyNum = null;

    #[Assert\Length(max: 255, maxMessage: 'MODE_OF_PAYMENT cannot be longer than {{ limit }} characters')]
    #[Assert\Choice(choices: ['Credit Card', 'Bank Transfer', 'Cash', 'Check'], message: 'MODE_OF_PAYMENT must be one of {{ choices }}')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('MODE_OF_PAYMENT')]
    public ?string $modeOfPayment = null;

    #[Assert\Length(max: 255, maxMessage: 'BANK_CHEQUE_NUM cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('BANK_CHEQUE_NUM')]
    public ?string $bankChequeNum = null;

    #[Assert\Length(max: 255, maxMessage: 'REMARKS cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('REMARKS')]
    public ?string $remarks = null;

    #[Assert\Length(max: 255, maxMessage: 'CLIENT_NAME cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('CLIENT_NAME')]
    public ?string $clientName = null;

    #[Assert\Length(max: 255, maxMessage: 'LOGDMENT cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('LOGDMENT')]
    public ?string $logdment = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'LODGMENT_DATE must be in YYYY-MM-DD format')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('LODGMENT_DATE')]
    public ?string $lodgmentDate = null;

    #[Assert\Length(max: 255, maxMessage: 'Field16 cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('Field16')]
    public ?string $field16 = null;

    #[Assert\Length(max: 255, maxMessage: 'QB_INV_NUM cannot be longer than {{ limit }} characters')]
    #[Groups(['receipts:read', 'receipts:write'])]
    #[SerializedName('QB_INV_NUM')]
    public ?string $qbInvNum = null;
}