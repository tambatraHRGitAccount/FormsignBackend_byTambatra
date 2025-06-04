<?php

namespace App\Repository;

use App\Entity\SMSNotification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SMSNotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SMSNotification::class);
    }

    public function findBySigner(string $signerId): array
    {
        return $this->findBy(['signer' => $signerId]);
    }
}