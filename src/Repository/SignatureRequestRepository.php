<?php

namespace App\Repository;

use App\Entity\SignatureRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SignatureRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SignatureRequest::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createQueryBuilder('sr');

        if (!empty($filters['id'])) {
            $qb->andWhere('sr.id = :id')
               ->setParameter('id', $filters['id']);
        }

        if (!empty($filters['name'])) {
            $qb->andWhere('sr.name LIKE :name')
               ->setParameter('name', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['status'])) {
            $qb->andWhere('sr.status = :status')
               ->setParameter('status', $filters['status']);
        }

        if (!empty($filters['expirationDate'])) {
            $date = \DateTime::createFromFormat('Y-m-d', $filters['expirationDate']);
            if ($date) {
                $qb->andWhere('sr.expirationDate = :expirationDate')
                   ->setParameter('expirationDate', $date->format('Y-m-d'));
            }
        }

        if (isset($filters['signersAllowedToDecline'])) {
            $qb->andWhere('sr.signersAllowedToDecline = :signersAllowedToDecline')
               ->setParameter('signersAllowedToDecline', filter_var($filters['signersAllowedToDecline'], FILTER_VALIDATE_BOOLEAN));
        }

        if (!empty($filters['senderId'])) {
            $qb->andWhere('sr.sender = :senderId')
               ->setParameter('senderId', $filters['senderId']);
        }

        return $qb->getQuery()->getResult();
    }
}