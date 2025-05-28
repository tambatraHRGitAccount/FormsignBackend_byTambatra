<?php

namespace App\Repository;

use App\Entity\Receipts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Receipt>
 */
class ReceiptRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Receipts::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createQueryBuilder('r');

        if (isset($filters['crmClientRef'])) {
            $qb->andWhere('r.crmClientRef = :crmClientRef')
               ->setParameter('crmClientRef', $filters['crmClientRef']);
        }

        if (isset($filters['receiptNum'])) {
            $qb->andWhere('r.receiptNum = :receiptNum')
               ->setParameter('receiptNum', $filters['receiptNum']);
        }

        if (isset($filters['receiptDate'])) {
            try {
                $date = new \DateTime($filters['receiptDate']);
                $qb->andWhere('r.receiptDate = :receiptDate')
                   ->setParameter('receiptDate', $date->format('Y-m-d'));
            } catch (\Exception $e) {
                // Ignore invalid date formats
            }
        }

        if (isset($filters['policyNum'])) {
            $qb->andWhere('r.policyNum = :policyNum')
               ->setParameter('policyNum', $filters['policyNum']);
        }

        if (isset($filters['modeOfPayment'])) {
            if (in_array($filters['modeOfPayment'], ['Credit Card', 'Bank Transfer', 'Cash', 'Check'])) {
                $qb->andWhere('r.modeOfPayment = :modeOfPayment')
                   ->setParameter('modeOfPayment', $filters['modeOfPayment']);
            }
        }

        if (isset($filters['clientName'])) {
            $qb->andWhere('r.clientName LIKE :clientName')
               ->setParameter('clientName', '%' . $filters['clientName'] . '%');
        }

        if (!empty($filters['qbInvNum'])) {
            $qb->andWhere('r.qbInvNum = :qbInvNum')
               ->setParameter('qbInvNum', $filters['qbInvNum']);
        }

        return $qb->getQuery()->getResult();
    }
}