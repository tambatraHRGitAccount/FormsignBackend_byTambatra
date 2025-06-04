<?php

namespace App\Repository;

use App\Entity\SignatureRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SignatureRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SignatureRequest::class);
    }

    public function findBySender(string $senderId): array
    {
        return $this->findBy(['sender' => $senderId]);
    }

    public function findByFolder(?string $folderId): array
    {
        return $this->findBy(['folder' => $folderId]);
    }
}