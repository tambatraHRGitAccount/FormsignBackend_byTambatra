<?php

namespace App\Repository;

use App\Entity\Folder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FolderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Folder::class);
    }

    public function findByUserAccount(string $userAccountId): array
    {
        return $this->findBy(['userAccount' => $userAccountId]);
    }

    public function findOneByNameAndUserAccount(string $name, string $userAccountId): ?Folder
    {
        return $this->findOneBy(['name' => $name, 'userAccount' => $userAccountId]);
    }
}