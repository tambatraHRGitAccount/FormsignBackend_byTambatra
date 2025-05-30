<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\PoliciesMaxSearch;
use Doctrine\ORM\EntityManagerInterface;

class PoliciesMaxProvider implements ProviderInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): PoliciesMaxSearch
    {
        // Query to get the maximum POLICY value
        $queryBuilder = $this->entityManager->createQueryBuilder()
            ->select('MAX(p.policy) as max_policy_value')
            ->from('App\Entity\Policies', 'p');

        $result = $queryBuilder->getQuery()->getSingleScalarResult();

        // Return a PoliciesMaxSearch object with the max value
        return new PoliciesMaxSearch(
            maxPolicyValue: $result
        );
    }
}