<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Debtors;
use App\State\DebtorsSearchProvider;

#[GetCollection(
    provider: DebtorsSearchProvider::class,
    uriTemplate: '/debtors-search',
)]
#[QueryParameter(key: 'crmClientRef')]
#[QueryParameter(key: 'receiptDate')]
#[QueryParameter(key: 'policyNum')]
#[QueryParameter(key: 'placingNum')]
#[QueryParameter(key: 'receiptNum')]
#[QueryParameter(key: 'modeOfPayment')]
#[QueryParameter(key: 'transactionRef')]
#[QueryParameter(key: 'clientName')]
class DebtorsSearch
{
    public function __construct(
        public ?string $crmClientRef = null,
        public ?string $receiptDate = null,
        public ?string $transact = null,
        public ?string $policyNum = null,
        public ?string $placingNum = null,
        public ?string $receiptNum = null,
        public ?string $modeOfPayment = null,
        public ?string $transactionRef = null,
        public ?float $amount = null,
        public ?string $clientName = null
    ) {
    }

    public static function mapFromDebtor(Debtors $debtor): DebtorsSearch
    {
        return new DebtorsSearch(
            crmClientRef: $debtor->getCrmClientRef(),
            receiptDate: $debtor->getReceiptDate() instanceof \DateTimeInterface ? $debtor->getReceiptDate()->format('Y-m-d') : null,
            transact: $debtor->getTransact(),
            policyNum: $debtor->getPolicyNum(),
            placingNum: $debtor->getPlacingNum(),
            receiptNum: $debtor->getReceiptNum(),
            modeOfPayment: $debtor->getModeOfPayment(),
            transactionRef: $debtor->getTransactionRef(),
            amount: $debtor->getAmount(),
            clientName: $debtor->getClientName()
        );
    }
}