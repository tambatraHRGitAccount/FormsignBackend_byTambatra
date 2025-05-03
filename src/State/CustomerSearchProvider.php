<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\CustomerSearch;
use App\Entity\Customer;
use App\Repository\CustomerRepository;

class CustomerSearchProvider implements ProviderInterface
{
    public function __construct(
        private CustomerRepository $customerRepository
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {        
        return array_map(function (Customer $customer) {
            return CustomerSearch::mapFromCustomer($customer);
        }, $this->customerRepository->findAllByFilter($context['filters'] ?? []));
    }
}