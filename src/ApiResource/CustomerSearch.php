<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Customer;
use App\Enum\PersonTitle;
use App\State\CustomerSearchProvider;

#[GetCollection(
    provider: CustomerSearchProvider::class,
    uriTemplate: '/customers-search',
)]
#[QueryParameter(key: 'surname')]
#[QueryParameter(key: 'forname')]
#[QueryParameter(key: 'contact_surname')]
#[QueryParameter(key: 'swanclientref')]
#[QueryParameter(key: 'crmclientref')]
#[QueryParameter(key: 'phone')]
#[QueryParameter(key: 'status')]
class CustomerSearch
{
    public function __construct(
        public ?int $id = null,
        public ?PersonTitle $title = null,
        public ?string $surname = null,
        public ?string $forename = null,
    ) {
    }

    public static function mapFromCustomer(Customer $customer) : CustomerSearch {
        return new CustomerSearch(
            $customer->getId(),
            $customer->getTitle(),
            $customer->getSurname(),
            $customer->getForename()
        );
    }
}
