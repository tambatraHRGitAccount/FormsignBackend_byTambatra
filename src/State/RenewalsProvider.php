<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\RenewalsSearch;
use App\Entity\Renewals;
use App\Repository\RenewalsRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class RenewalsProvider implements ProviderInterface
{
    private $renewalsRepository;
    private $requestStack;

    public function __construct(RenewalsRepository $renewalsRepository, RequestStack $requestStack)
    {
        $this->renewalsRepository = $renewalsRepository;
        $this->requestStack = $requestStack;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        $request = $this->requestStack->getCurrentRequest();
        $queryBuilder = $this->renewalsRepository->createQueryBuilder('r');

        // Apply filters based on query parameters
        if ($name = $request->query->get('name')) {
            $queryBuilder->andWhere('r.name LIKE :name')
                         ->setParameter('name', '%' . $name . '%');
        }

        if ($polcd = $request->query->get('polcd')) {
            $queryBuilder->andWhere('r.polcd = :polcd')
                         ->setParameter('polcd', $polcd);
        }

        if ($dtfrom = $request->query->get('dtfrom')) {
            try {
                $date = new \DateTime($dtfrom);
                $queryBuilder->andWhere('r.dtfrom >= :dtfrom')
                             ->setParameter('dtfrom', $date);
            } catch (\Exception $e) {
                // Ignore invalid date formats
            }
        }

        if ($dtto = $request->query->get('dtto')) {
            try {
                $date = new \DateTime($dtto);
                $queryBuilder->andWhere('r.dtto <= :dtto')
                             ->setParameter('dtto', $date);
            } catch (\Exception $e) {
                // Ignore invalid date formats
            }
        }

        if ($regno = $request->query->get('regno')) {
            $queryBuilder->andWhere('r.regno LIKE :regno')
                         ->setParameter('regno', '%' . $regno . '%');
        }

        if ($premium = $request->query->get('premium')) {
            if (is_numeric($premium)) {
                $queryBuilder->andWhere('r.premium = :premium')
                             ->setParameter('premium', (float) $premium);
            }
        }

        // Execute query
        $renewals = $queryBuilder->getQuery()->getResult();

        // Map results to RenewalsSearch API resource
        $mappedRenewals = array_map(function (Renewals $renewal) {
            return RenewalsSearch::mapFromRenewals($renewal);
        }, $renewals);

        // Return structured response
        return [
            '@context' => '/api/contexts/RenewalsSearch',
            '@id' => '/api/renewals-search',
            '@type' => 'Collection',
            'totalItems' => count($mappedRenewals),
            'member' => $mappedRenewals,
        ];
    }
}