<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Successors;
use App\State\SuccessorsSearchProvider;

#[GetCollection(
    provider: SuccessorsSearchProvider::class,
    uriTemplate: '/successors-search',
)]
#[QueryParameter(key: 'crmClientRef')]
#[QueryParameter(key: 'title')]
#[QueryParameter(key: 'surname')]
#[QueryParameter(key: 'forename')]
#[QueryParameter(key: 'email_address_1')]
#[QueryParameter(key: 'is_authorized')]
class SuccessorsSearch
{
    public function __construct(
        public ?int $id = null,
        public ?string $crmClientRef = null,
        public ?string $title = null,
        public ?string $surname = null,
        public ?string $forename = null,
        public ?string $address = null,
        public ?string $phone1 = null,
        public ?string $phone2 = null,
        public ?string $phone3 = null,
        public ?string $phone4 = null,
        public ?string $email_address_1 = null,
        public ?string $contact_remarks = null,
        public ?bool $is_authorized = null,
        public ?\DateTimeInterface $created_at = null,
        public ?\DateTimeInterface $updated_at = null
    ) {
    }

    public static function mapFromSuccessors(Successors $successor): SuccessorsSearch
    {
        return new SuccessorsSearch(
            id: $successor->getId(),
            crmClientRef: $successor->getCrmClientRef(),
            title: $successor->getTitle(),
            surname: $successor->getSurname(),
            forename: $successor->getForename(),
            address: $successor->getAddress(),
            phone1: $successor->getPhone1(),
            phone2: $successor->getPhone2(),
            phone3: $successor->getPhone3(),
            phone4: $successor->getPhone4(),
            email_address_1: $successor->getEmailAddress1(),
            contact_remarks: $successor->getContactRemarks(),
            is_authorized: $successor->getIsAuthorized(),
            created_at: $successor->getCreatedAt(),
            updated_at: $successor->getUpdatedAt()
        );
    }
}