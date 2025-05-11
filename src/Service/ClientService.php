<?php

namespace App\Service;

use App\Entity\Clients;
use Doctrine\ORM\EntityManagerInterface;

class ClientService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Récupère l'ID et le CRMClientRef du dernier client inséré.
     *
     * @return array|null Retourne un tableau avec 'id' et 'crmClientRef' ou null si aucun client n'existe.
     */
    public function getLastInsertedClient(): ?array
    {
        $client = $this->entityManager
            ->getRepository(Clients::class)
            ->findOneBy([], ['id' => 'DESC']);

        if (!$client) {
            return null;
        }

        return [
            'id' => $client->getId(),
            'crmClientRef' => $client->getCrmClientRef()
        ];
    }
}