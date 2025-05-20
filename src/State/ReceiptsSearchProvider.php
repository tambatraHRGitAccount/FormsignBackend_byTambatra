<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\ReceiptsSearch;
use App\Entity\Receipt;
use App\Entity\Receipts;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class ReceiptsSearchProvider implements ProviderInterface
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
        $queryBuilder = $this->entityManager->getRepository(Receipts::class)->createQueryBuilder('r');

        // Apply filters based on query parameters
        if ($crmClientRef = $request->query->get('crmClientRef')) {
            $queryBuilder->andWhere('r.crmClientRef = :crmClientRef')
                         ->setParameter('crmClientRef', $crmClientRef);
        }

        if ($receiptNum = $request->query->get('receiptNum')) {
            $queryBuilder->andWhere('r.receiptNum = :receiptNum')
                         ->setParameter('receiptNum', $receiptNum);
        }

        if ($receiptDate = $request->query->get('receiptDate')) {
            try {
                $date = new \DateTime($receiptDate);
                $queryBuilder->andWhere('r.receiptDate = :receiptDate')
                             ->setParameter('receiptDate', $date->format('Y-m-d'));
            } catch (\Exception $e) {
                // Ignore invalid date formats
            }
        }

        if ($policyNum = $request->query->get('policyNum')) {
            $queryBuilder->andWhere('r.policyNum = :policyNum')
                         ->setParameter('policyNum', $policyNum);
        }

        if ($modeOfPayment = $request->query->get('modeOfPayment')) {
            if (in_array($modeOfPayment, ['Credit Card', 'Bank Transfer', 'Cash', 'Check'])) {
                $queryBuilder->andWhere('r.modeOfPayment = :modeOfPayment')
                             ->setParameter('modeOfPayment', $modeOfPayment);
            }
        }

        if ($clientName = $request->query->get('clientName')) {
            $queryBuilder->andWhere('r.clientName LIKE :clientName')
                         ->setParameter('clientName', '%' . $clientName . '%');
        }

        // Execute query
        $receipts = $queryBuilder->getQuery()->getResult();

        // Map results to ReceiptsSearch objects
        return array_map(function ($receipt) {
            return ReceiptsSearch::mapFromReceipt($receipt);
        }, $receipts);
    }
}