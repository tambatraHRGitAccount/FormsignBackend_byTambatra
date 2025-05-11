<?php

namespace App\Repository;

use App\Entity\Renewals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RenewalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Renewals::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createQueryBuilder('r');

        if (!empty($filters['polser'])) {
            $qb->andWhere('r.polser = :polser')
               ->setParameter('polser', $filters['polser']);
        }

        if (!empty($filters['client'])) {
            $qb->andWhere('r.client LIKE :client')
               ->setParameter('client', '%' . $filters['client'] . '%');
        }

        if (!empty($filters['name'])) {
            $qb->andWhere('r.name LIKE :name')
               ->setParameter('name', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['regno'])) {
            $qb->andWhere('r.regno LIKE :regno')
               ->setParameter('regno', '%' . $filters['regno'] . '%');
        }

        if (!empty($filters['dtfrom'])) {
            $qb->andWhere('r.dtfrom = :dtfrom')
               ->setParameter('dtfrom', new \DateTime($filters['dtfrom']));
        }

        if (!empty($filters['dtto'])) {
            $qb->andWhere('r.dtto = :dtto')
               ->setParameter('dtto', new \DateTime($filters['dtto']));
        }

        return $qb->getQuery()->getResult();
    }
}