<?php

namespace App\Repository;

use App\Entity\Claims;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ClaimsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Claims::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createQueryBuilder('c');

        if (!empty($filters['claimNo'])) {
            $qb->andWhere('c.claimNo = :claimNo')
               ->setParameter('claimNo', $filters['claimNo']);
        }

        if (!empty($filters['crmClientRef'])) {
            $qb->andWhere('c.crmClientRef = :crmClientRef')
               ->setParameter('crmClientRef', $filters['crmClientRef']);
        }

        if (!empty($filters['surname'])) {
            $qb->andWhere('c.surname LIKE :surname')
               ->setParameter('surname', '%' . $filters['surname'] . '%');
        }

        if (!empty($filters['forename'])) {
            $qb->andWhere('c.forename LIKE :forename')
               ->setParameter('forename', '%' . $filters['forename'] . '%');
        }

        if (!empty($filters['dateOfAccident'])) {
            $qb->andWhere('c.dateOfAccident = :dateOfAccident')
               ->setParameter('dateOfAccident', new \DateTime($filters['dateOfAccident']));
        }

        if (!empty($filters['insVehNo'])) {
            $qb->andWhere('c.insVehNo LIKE :insVehNo')
               ->setParameter('insVehNo', '%' . $filters['insVehNo'] . '%');
        }

        if (!empty($filters['status'])) {
            $qb->andWhere('c.status = :status')
               ->setParameter('status', $filters['status']);
        }

        if (!empty($filters['caseStageReached'])) {
            $qb->andWhere('c.caseStageReached LIKE :caseStageReached')
               ->setParameter('caseStageReached', '%' . $filters['caseStageReached'] . '%');
        }

        return $qb->getQuery()->getResult();
    }
}