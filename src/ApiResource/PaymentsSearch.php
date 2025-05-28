<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Payments;
use App\State\PaymentsSearchProvider;

#[GetCollection(
    provider: PaymentsSearchProvider::class,
    uriTemplate: '/payments-search',
)]
#[QueryParameter(key: 'crmClientRef')]
#[QueryParameter(key: 'policyNum')]
#[QueryParameter(key: 'swanClientRef')]
#[QueryParameter(key: 'paymentNumber')]
#[QueryParameter(key: 'qbInvNum')]
#[QueryParameter(key: 'id')] // Added id as a query parameter
class PaymentsSearch
{
    public function __construct(
        public ?int $id = null, // Added id property
        public ?string $policyNum = null,
        public ?string $swanClientRef = null,
        public ?string $accMonth = null,
        public ?string $accYear = null,
        public ?string $placingNumber = null,
        public ?string $paymentNumber = null,
        public ?string $modeOfPayment = null,
        public ?string $dueDate = null,
        public ?float $amountDue = null,
        public ?string $paidDate = null,
        public ?float $amountPaid = null,
        public ?string $crmClientRef = null,
        public ?string $transaction = null,
        public ?string $qbInvNum = null
    ) {
    }

    public static function mapFromPayments(Payments $payments): PaymentsSearch
    {
        return new PaymentsSearch(
            id: $payments->getId(), // Added mapping for id
            policyNum: $payments->getPolicyNum(),
            swanClientRef: $payments->getSwanClientRef(),
            accMonth: $payments->getAccMonth(),
            accYear: $payments->getAccYear(),
            placingNumber: $payments->getPlacingNumber(),
            paymentNumber: $payments->getPaymentNumber(),
            modeOfPayment: $payments->getModeOfPayment(),
            dueDate: $payments->getDueDate() ? $payments->getDueDate()->format('d/m/Y') : null,
            amountDue: $payments->getAmountDue(),
            paidDate: $payments->getPaidDate() ? $payments->getPaidDate()->format('d/m/Y') : null,
            amountPaid: $payments->getAmountPaid(),
            crmClientRef: $payments->getCrmClientRef(),
            transaction: $payments->getTransaction(),
            qbInvNum: $payments->getQbInvNum()
        );
    }
}