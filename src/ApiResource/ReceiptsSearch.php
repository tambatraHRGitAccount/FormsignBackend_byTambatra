<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Receipt;
use App\Dto\ReceiptsDto;
use App\Entity\Receipts;
use App\State\ReceiptsSearchProvider;

#[GetCollection(
    provider: ReceiptsSearchProvider::class,
    uriTemplate: '/api/receipts-search',
)]
#[QueryParameter(key: 'crmClientRef')]
#[QueryParameter(key: 'receiptNum')]
#[QueryParameter(key: 'receiptDate')]
#[QueryParameter(key: 'policyNum')]
#[QueryParameter(key: 'modeOfPayment')]
#[QueryParameter(key: 'clientName')]
class ReceiptsSearch
{
    public function __construct(
        public ?string $crmClientRef = null,
        public ?string $receiptNum = null,
        public ?string $receiptDate = null,
        public ?string $amountInLetter = null,
        public ?float $amountInNumbers = null,
        public ?string $dateFrom = null,
        public ?string $dateTo = null,
        public ?string $registrationNumber = null,
        public ?string $policyNum = null,
        public ?string $modeOfPayment = null,
        public ?string $bankChequeNum = null,
        public ?string $remarks = null,
        public ?string $clientName = null,
        public ?string $logdment = null,
        public ?string $lodgmentDate = null,
        public ?string $field16 = null
    ) {
    }

    public static function mapFromReceipt(Receipts $receipt): ReceiptsSearch
    {
        return new ReceiptsSearch(
            crmClientRef: $receipt->getCrmClientRef(),
            receiptNum: $receipt->getReceiptNum(),
            receiptDate: $receipt->getReceiptDate() instanceof \DateTimeInterface ? $receipt->getReceiptDate()->format('Y-m-d') : null,
            amountInLetter: $receipt->getAmountInLetter(),
            amountInNumbers: $receipt->getAmountInNumbers(),
            dateFrom: $receipt->getDateFrom() instanceof \DateTimeInterface ? $receipt->getDateFrom()->format('Y-m-d') : null,
            dateTo: $receipt->getDateTo() instanceof \DateTimeInterface ? $receipt->getDateTo()->format('Y-m-d') : null,
            registrationNumber: $receipt->getRegistrationNumber(),
            policyNum: $receipt->getPolicyNum(),
            modeOfPayment: $receipt->getModeOfPayment(),
            bankChequeNum: $receipt->getBankChequeNum(),
            remarks: $receipt->getRemarks(),
            clientName: $receipt->getClientName(),
            logdment: $receipt->getLogdment(),
            lodgmentDate: $receipt->getLodgmentDate() instanceof \DateTimeInterface ? $receipt->getLodgmentDate()->format('Y-m-d') : null,
            field16: $receipt->getField16()
        );
    }
}