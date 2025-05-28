<?php

namespace App\Repository;

use App\Entity\Payments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PaymentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Payments::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createQueryBuilder('p');

        if (!empty($filters['policyNum'])) {
            $qb->andWhere('p.policyNum = :policyNum')
               ->setParameter('policyNum', $filters['policyNum']);
        }

        if (!empty($filters['swanClientRef'])) {
            $qb->andWhere('p.swanClientRef = :swanClientRef')
               ->setParameter('swanClientRef', $filters['swanClientRef']);
        }

        if (!empty($filters['accMonth'])) {
            $qb->andWhere('p.accMonth LIKE :accMonth')
               ->setParameter('accMonth', '%' . $filters['accMonth'] . '%');
        }

        if (!empty($filters['accYear'])) {
            $qb->andWhere('p.accYear LIKE :accYear')
               ->setParameter('accYear', '%' . $filters['accYear'] . '%');
        }

        if (!empty($filters['placingNumber'])) {
            $qb->andWhere('p.placingNumber = :placingNumber')
               ->setParameter('placingNumber', $filters['placingNumber']);
        }

        if (!empty($filters['paymentNumber'])) {
            $qb->andWhere('p.paymentNumber = :paymentNumber')
               ->setParameter('paymentNumber', $filters['paymentNumber']);
        }

        if (!empty($filters['modeOfPayment'])) {
            $qb->andWhere('p.modeOfPayment LIKE :modeOfPayment')
               ->setParameter('modeOfPayment', '%' . $filters['modeOfPayment'] . '%');
        }

        if (!empty($filters['dueDate'])) {
            $qb->andWhere('p.dueDate = :dueDate')
               ->setParameter('dueDate', new \DateTime($filters['dueDate']));
        }

        if (!empty($filters['amountDue'])) {
            $qb->andWhere('p.amountDue = :amountDue')
               ->setParameter('amountDue', $filters['amountDue']);
        }

        if (!empty($filters['paidDate'])) {
            $qb->andWhere('p.paidDate = :paidDate')
               ->setParameter('paidDate', new \DateTime($filters['paidDate']));
        }

        if (!empty($filters['amountPaid'])) {
            $qb->andWhere('p.amountPaid = :amountPaid')
               ->setParameter('amountPaid', $filters['amountPaid']);
        }

        if (!empty($filters['crmClientRef'])) {
            $qb->andWhere('p.crmClientRef = :crmClientRef')
               ->setParameter('crmClientRef', $filters['crmClientRef']);
        }

        if (!empty($filters['transaction'])) {
            $qb->andWhere('p.transaction LIKE :transaction')
               ->setParameter('transaction', '%' . $filters['transaction'] . '%');
        }

        if (!empty($filters['qbInvNum'])) {
            $qb->andWhere('p.qbInvNum = :qbInvNum')
               ->setParameter('qbInvNum', $filters['qbInvNum']);
        }

        return $qb->getQuery()->getResult();
    }
}