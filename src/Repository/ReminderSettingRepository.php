<?php

namespace App\Repository;

use App\Entity\ReminderSetting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReminderSettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReminderSetting::class);
    }

    public function findBySignatureRequest(string $signatureRequestId): array
    {
        return $this->findBy(['signatureRequest' => $signatureRequestId]);
    }
}