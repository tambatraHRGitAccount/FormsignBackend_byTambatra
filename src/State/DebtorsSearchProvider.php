<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\DebtorsSearch;
use App\Entity\Debtors;
use App\Repository\DebtorsRepository;

class DebtorsSearchProvider implements ProviderInterface
{
    public function __construct(
        private DebtorsRepository $debtorsRepository
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        $debtors = $this->debtorsRepository->findAllByFilter($context['filters'] ?? []);

        $mappedDebtors = array_map(function (Debtors $debtor) {
            return DebtorsSearch::mapFromDebtor($debtor);
        }, $debtors);

        return [
            '@context' => '/api/contexts/DebtorsSearch',
            '@id' => '/api/debtors-search',
            '@type' => 'Collection',
            'totalItems' => count($mappedDebtors),
            'member' => $mappedDebtors,
        ];
    }
}