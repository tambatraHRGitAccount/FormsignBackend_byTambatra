<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\PoliciesSearch;
use App\Entity\Policies;
use App\Repository\PoliciesRepository;

class PoliciesSearchProvider implements ProviderInterface
{
    public function __construct(
        private PoliciesRepository $policiesRepository
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        return array_map(function (Policies $policies) {
            return PoliciesSearch::mapFromPolicies($policies);
        }, $this->policiesRepository->findAllByFilter($context['filters'] ?? []));
    }
}