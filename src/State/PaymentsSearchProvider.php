<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\PaymentsSearch;
use App\Entity\Payments;
use App\Repository\PaymentsRepository;

class PaymentsSearchProvider implements ProviderInterface
{
    public function __construct(
        private PaymentsRepository $paymentsRepository
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        return array_map(function (Payments $payments) {
            return PaymentsSearch::mapFromPayments($payments);
        }, $this->paymentsRepository->findAllByFilter($context['filters'] ?? []));
    }
}