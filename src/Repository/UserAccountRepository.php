<?php

namespace App\Repository;

use App\Entity\UserAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserAccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserAccount::class);
    }

    public function findByEmail(string $email): ?UserAccount
    {
        return $this->findOneBy(['email' => $email]);
    }

    public function findByApiToken(string $apiToken): ?UserAccount
    {
        return $this->findOneBy(['apiToken' => $apiToken]);
    }
}