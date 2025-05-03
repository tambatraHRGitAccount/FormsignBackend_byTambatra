<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Customer>
 */
class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this
            ->createQueryBuilder('c')
            ->leftJoin('c.personToContact', 'contact');

        if (!empty($filters['surname'])) {
            $qb->andWhere('c.surname LIKE :surname')
               ->setParameter('surname', '%' . $filters['surname'] . '%');
        }

        if (!empty($filters['forename'])) {
            $qb->andWhere('c.forename LIKE :forename')
               ->setParameter('forename', '%' . $filters['forename'] . '%');
        }

        if (!empty($filters['contact_surname'])) {
            $qb->andWhere('contact.surname LIKE :contact_surname')
               ->setParameter('contact_surname', '%' . $filters['contact_surname'] . '%');
        }

        if (!empty($filters['swanclientref'])) {
            $qb->andWhere('c.swanClientRef = :swanclientref')
               ->setParameter('swanclientref', $filters['swanclientref']);
        }

        if (!empty($filters['crmclientref'])) {
            $qb->andWhere('c.crmClientRef = :crmclientref')
               ->setParameter('crmclientref', $filters['crmclientref']);
        }

        if (!empty($filters['phone'])) {
            $qb->andWhere(
                $qb->expr()->orX(
                    'c.phone1 LIKE :phone',
                    'c.phone2 LIKE :phone',
                    'c.phone3 LIKE :phone',
                    'c.phone4 LIKE :phone'
                )
            )
            ->setParameter('phone', '%' . $filters['phone'] . '%');
        }

        if (!empty($filters['status'])) {
            $qb->andWhere('c.status = :status')
               ->setParameter('status', $filters['status']);
        }

        return $qb->orderBy('c.surname', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByCrmClientRef(string $crmClientRef): ?Customer
    {
        return $this->createQueryBuilder('c')
            ->where('c.crmClientRef = :crmClientRef')
            ->setParameter('crmClientRef', $crmClientRef)
            ->getQuery()
            ->getOneOrNullResult();
    }
}