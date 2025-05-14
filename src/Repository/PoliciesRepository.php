<?php

namespace App\Repository;

use App\Entity\Policies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PoliciesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Policies::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createQueryBuilder('p');

        if (!empty($filters['policy'])) {
            $qb->andWhere('p.policy = :policy')
               ->setParameter('policy', $filters['policy']);
        }

        if (!empty($filters['qbInvNum'])) {
            $qb->andWhere('p.qbInvNum LIKE :qbInvNum')
               ->setParameter('qbInvNum', '%' . $filters['qbInvNum'] . '%');
        }

        if (!empty($filters['swanClientRef'])) {
            $qb->andWhere('p.swanClientRef = :swanClientRef')
               ->setParameter('swanClientRef', $filters['swanClientRef']);
        }

        if (!empty($filters['fullName'])) {
            $qb->andWhere('p.fullName LIKE :fullName')
               ->setParameter('fullName', '%' . $filters['fullName'] . '%');
        }

        if (!empty($filters['dateFrom'])) {
            $qb->andWhere('p.dateFrom = :dateFrom')
               ->setParameter('dateFrom', new \DateTime($filters['dateFrom']));
        }

        if (!empty($filters['dateTo'])) {
            $qb->andWhere('p.dateTo = :dateTo')
               ->setParameter('dateTo', new \DateTime($filters['dateTo']));
        }

        if (!empty($filters['premium'])) {
            $qb->andWhere('p.premium = :premium')
               ->setParameter('premium', $filters['premium']);
        }

        if (!empty($filters['cashCreditTransac'])) {
            $qb->andWhere('p.cashCreditTransac LIKE :cashCreditTransac')
               ->setParameter('cashCreditTransac', '%' . $filters['cashCreditTransac'] . '%');
        }

        if (!empty($filters['registrationNumber'])) {
            $qb->andWhere('p.registrationNumber LIKE :registrationNumber')
               ->setParameter('registrationNumber', '%' . $filters['registrationNumber'] . '%');
        }

        if (!empty($filters['crmClientRef'])) {
            $qb->andWhere('p.crmClientRef = :crmClientRef')
               ->setParameter('crmClientRef', $filters['crmClientRef']);
        }

        return $qb->getQuery()->getResult();
    }


    public function findMaxValues(): array
    {
        $result = $this->createQueryBuilder('p')
            ->select('COALESCE(MAX(p.qbInvNum), :defaultQbInvNum) AS maxQbInvNum')
            ->addSelect('COALESCE(MAX(p.placingNumber), :defaultPlacingNumber) AS maxPlacingNumber')
            ->setParameter('defaultQbInvNum', '19999')
            ->setParameter('defaultPlacingNumber', '2999')
            ->getQuery()
            ->getSingleResult();

        return $result;
    }
}