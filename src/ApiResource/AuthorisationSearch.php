<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Authorisation;
use App\State\AuthorisationSearchProvider;

#[GetCollection(
    provider: AuthorisationSearchProvider::class,
    uriTemplate: '/authorisations-search',
)]
#[QueryParameter(key: 'titleAuthPerson')]
#[QueryParameter(key: 'surnameAuthPerson')]
#[QueryParameter(key: 'forenameAuthPerson')]
#[QueryParameter(key: 'jobTitleAuthPerson')]
#[QueryParameter(key: 'phone1AuthPerson')]
#[QueryParameter(key: 'phone2AuthPerson')]
#[QueryParameter(key: 'phone3AuthPerson')]
#[QueryParameter(key: 'phone4AuthPerson')]
#[QueryParameter(key: 'emailAddress1AuthPerson')]
#[QueryParameter(key: 'crmClientRef')]
class AuthorisationSearch
{
    public function __construct(
        public ?int $id_auth = null,
        public ?string $titleAuthPerson = null,
        public ?string $surnameAuthPerson = null,
        public ?string $forenameAuthPerson = null,
        public ?string $jobTitleAuthPerson = null,
        public ?string $phone1AuthPerson = null,
        public ?string $phone2AuthPerson = null,
        public ?string $phone3AuthPerson = null,
        public ?string $phone4AuthPerson = null,
        public ?string $emailAddress1AuthPerson = null,
        public ?string $crmClientRef = null
    ) {
    }

    public static function mapFromAuthorisation(Authorisation $authorisation): AuthorisationSearch
    {
        return new AuthorisationSearch(
            id_auth: $authorisation->getIdAuth(),
            titleAuthPerson: $authorisation->getTitleAuthPerson(),
            surnameAuthPerson: $authorisation->getSurnameAuthPerson(),
            forenameAuthPerson: $authorisation->getForenameAuthPerson(),
            jobTitleAuthPerson: $authorisation->getJobTitleAuthPerson(),
            phone1AuthPerson: $authorisation->getPhone1AuthPerson(),
            phone2AuthPerson: $authorisation->getPhone2AuthPerson(),
            phone3AuthPerson: $authorisation->getPhone3AuthPerson(),
            phone4AuthPerson: $authorisation->getPhone4AuthPerson(),
            emailAddress1AuthPerson: $authorisation->getEmailAddress1AuthPerson(),
            crmClientRef: $authorisation->getCrmClientRef()
        );
    }
}