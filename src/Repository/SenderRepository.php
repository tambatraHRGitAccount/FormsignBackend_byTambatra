<?php

namespace App\Repository;

use App\Entity\Sender;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SenderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sender::class);
    }

    public function findByEmail(string $email): array
    {
        return $this->findBy(['email' => $email]);
    }
}