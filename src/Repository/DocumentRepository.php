<?php

namespace App\Repository;

use App\Entity\Document;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

class DocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Document::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createQueryBuilder('d');

        if (!empty($filters['id'])) {
            $qb->andWhere('d.id = :id')
               ->setParameter('id', Uuid::fromString($filters['id']));
        }

        if (!empty($filters['name'])) {
            $qb->andWhere('d.name LIKE :name')
               ->setParameter('name', '%' . $filters['name'] . '%');
        }

        if (isset($filters['isSignable'])) {
            $qb->andWhere('d.isSignable = :isSignable')
               ->setParameter('isSignable', filter_var($filters['isSignable'], FILTER_VALIDATE_BOOLEAN));
        }

        if (!empty($filters['signedHash'])) {
            $qb->andWhere('d.signedHash = :signedHash')
               ->setParameter('signedHash', $filters['signedHash']);
        }

        if (!empty($filters['signatureRequestId'])) {
            $qb->andWhere('d.signatureRequest = :signatureRequestId')
               ->setParameter('signatureRequestId', $filters['signatureRequestId']);
        }

        if (!empty($filters['insertAfterId'])) {
            $qb->andWhere('d.insertAfterId = :insertAfterId')
               ->setParameter('insertAfterId', (int) $filters['insertAfterId']);
        }

        return $qb->getQuery()->getResult();
    }
}