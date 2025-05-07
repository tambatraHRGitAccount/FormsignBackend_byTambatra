<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Family;
use App\Enum\FamilyType;
use App\State\FamilySearchProvider;

#[GetCollection(
    provider: FamilySearchProvider::class,
    uriTemplate: '/families-search',
)]
#[QueryParameter(key: 'crmClientRef')]
#[QueryParameter(key: 'type')]
#[QueryParameter(key: 'surname')]
#[QueryParameter(key: 'forename')]
#[QueryParameter(key: 'dateOfBirth')]
#[QueryParameter(key: 'age')]
class FamilySearch
{
    public function __construct(
        public ?int $id = null,
        public ?string $crmClientRef = null,
        public ?FamilyType $type = null,
        public ?string $surname = null,
        public ?string $forename = null,
        public ?\DateTimeInterface $dateOfBirth = null,
        public ?int $age = null
    ) {
    }

    public static function mapFromFamily(Family $family): FamilySearch
    {
        return new FamilySearch(
            id: $family->getId(),
            crmClientRef: $family->getCrmClientRef(),
            type: $family->getType(),
            surname: $family->getSurname(),
            forename: $family->getForename(),
            dateOfBirth: $family->getDateOfBirth(),
            age: $family->getAge()
        );
    }
}