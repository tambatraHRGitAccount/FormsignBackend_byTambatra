<?php

namespace App\Repository;

use App\Entity\Signer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SignerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Signer::class);
    }

    public function findBySignatureRequest(string $signatureRequestId): array
    {
        return $this->findBy(['signatureRequest' => $signatureRequestId]);
    }

    public function findByEmail(string $email): ?Signer
    {
        return $this->findOneBy(['email' => $email]);
    }
}