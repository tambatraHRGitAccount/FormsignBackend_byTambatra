<?php

namespace App\Repository;

use App\Entity\Webhook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class WebhookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Webhook::class);
    }

    public function findBySignatureRequest(string $signatureRequestId): array
    {
        return $this->findBy(['signatureRequest' => $signatureRequestId]);
    }
}