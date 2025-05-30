<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\PoliciesDistinctSearch;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class PoliciesDistinctProvider implements ProviderInterface
{
    private $entityManager;
    private $requestStack;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack)
    {
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        $request = $this->requestStack->getCurrentRequest();
        $crmClientRef = $request->query->get('crmClientRef');

        // Query 1: Get distinct POLICY values
        $queryBuilderDistinct = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT p.policy as policy')
            ->from('App\Entity\Policies', 'p');

        if ($crmClientRef) {
            $queryBuilderDistinct->andWhere('p.crmClientRef = :crmClientRef')
                                ->setParameter('crmClientRef', $crmClientRef);
        }

        $distinctResults = $queryBuilderDistinct->getQuery()->getResult();

        // Query 2: Check if any policy exists
        $queryBuilderExists = $this->entityManager->createQueryBuilder()
            ->select('COUNT(p.id) as policy_count')
            ->from('App\Entity\Policies', 'p');

        if ($crmClientRef) {
            $queryBuilderExists->andWhere('p.crmClientRef = :crmClientRef')
                               ->setParameter('crmClientRef', $crmClientRef);
        }

        $policyCount = $queryBuilderExists->getQuery()->getSingleScalarResult();
        $policyExists = (bool) $policyCount; // Convert count to boolean

        // Map distinct results to PoliciesDistinctSearch objects
        $policies = array_map(function ($result) use ($crmClientRef, $policyExists) {
            return new PoliciesDistinctSearch(
                policy: $result['policy'],
                crmClientRef: $crmClientRef,
                policyExists: $policyExists
            );
        }, $distinctResults);

        // If no policies found, return a single object with policyExists
        if (empty($policies)) {
            return [new PoliciesDistinctSearch(
                policy: null,
                crmClientRef: $crmClientRef,
                policyExists: $policyExists
            )];
        }

        return $policies;
    }
}