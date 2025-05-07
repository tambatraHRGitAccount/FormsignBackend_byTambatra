<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\CustomerSearch;
use App\Entity\Clients; // Remplacer Customer par Clients
use App\Repository\ClientsRepository; // Remplacer CustomerRepository par ClientsRepository

class CustomerSearchProvider implements ProviderInterface
{
    public function __construct(
        private ClientsRepository $clientsRepository // Remplacer CustomerRepository par ClientsRepository
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {        
        return array_map(function (Clients $client) { // Remplacer Customer par Clients
            return CustomerSearch::mapFromClient($client); // Remplacer mapFromCustomer par mapFromClient
        }, $this->clientsRepository->findAllByFilter($context['filters'] ?? []));
    }
}