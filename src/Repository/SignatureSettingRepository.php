<?php

namespace App\Repository;

use App\Entity\SignatureSetting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SignatureSettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SignatureSetting::class);
    }

    public function findByDocument(string $documentId): array
    {
        return $this->findBy(['document' => $documentId]);
    }
}