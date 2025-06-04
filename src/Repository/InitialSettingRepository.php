<?php

namespace App\Repository;

use App\Entity\InitialSetting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class InitialSettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InitialSetting::class);
    }

    public function findByDocument(string $documentId): array
    {
        return $this->findBy(['document' => $documentId]);
    }
}