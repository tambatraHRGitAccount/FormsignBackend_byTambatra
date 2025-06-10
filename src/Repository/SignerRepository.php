<?php

namespace App\Repository;

use App\Entity\Signer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

class SignerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Signer::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createQueryBuilder('s');

        if (!empty($filters['id'])) {
            $qb->andWhere('s.id = :id')
               ->setParameter('id', Uuid::fromString($filters['id']));
        }

        if (!empty($filters['firstName'])) {
            $qb->andWhere('s.firstName LIKE :firstName')
               ->setParameter('firstName', '%' . $filters['firstName'] . '%');
        }

        if (!empty($filters['lastName'])) {
            $qb->andWhere('s.lastName LIKE :lastName')
               ->setParameter('lastName', '%' . $filters['lastName'] . '%');
        }

        if (!empty($filters['email'])) {
            $qb->andWhere('s.email LIKE :email')
               ->setParameter('email', '%' . $filters['email'] . '%');
        }

        if (!empty($filters['phoneNumber'])) {
            $qb->andWhere('s.phoneNumber LIKE :phoneNumber')
               ->setParameter('phoneNumber', '%' . $filters['phoneNumber'] . '%');
        }

        if (!empty($filters['signatureAuthenticationMode'])) {
            $qb->andWhere('s.signatureAuthenticationMode = :signatureAuthenticationMode')
               ->setParameter('signatureAuthenticationMode', $filters['signatureAuthenticationMode']);
        }

        if (!empty($filters['insertAfterId'])) {
            $qb->andWhere('s.insertAfterId = :insertAfterId')
               ->setParameter('insertAfterId', (int) $filters['insertAfterId']);
        }

        if (!empty($filters['signatureRequestId'])) {
            $qb->andWhere('s.signatureRequest = :signatureRequestId')
               ->setParameter('signatureRequestId', $filters['signatureRequestId']);
        }

        return $qb->getQuery()->getResult();
    }
}