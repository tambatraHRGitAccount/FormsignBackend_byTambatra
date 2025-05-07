<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Clients;
use App\State\CustomerSearchProvider;

#[GetCollection(
    provider: CustomerSearchProvider::class,
    uriTemplate: '/customers-search',
)]
#[QueryParameter(key: 'surname')]
#[QueryParameter(key: 'forename')]
#[QueryParameter(key: 'contact_surname')]
#[QueryParameter(key: 'swanclientref')]
#[QueryParameter(key: 'crmclientref')]
#[QueryParameter(key: 'phone')]
#[QueryParameter(key: 'status')]
#[QueryParameter(key: 'title')]
#[QueryParameter(key: 'spouseFullName')]
#[QueryParameter(key: 'dtClientRef')]
#[QueryParameter(key: 'street')]
#[QueryParameter(key: 'street2')]
#[QueryParameter(key: 'town')]
#[QueryParameter(key: 'zipCode')]
#[QueryParameter(key: 'nationalId')]
#[QueryParameter(key: 'dateOfBirth')]
#[QueryParameter(key: 'nationality')]
#[QueryParameter(key: 'passportNo')]
#[QueryParameter(key: 'emailAddress1')]
#[QueryParameter(key: 'kycIndicator')]
#[QueryParameter(key: 'employmentStatus')]
#[QueryParameter(key: 'jobTitle')]
#[QueryParameter(key: 'employerName')]
#[QueryParameter(key: 'employerAddress')]
#[QueryParameter(key: 'brn')]
#[QueryParameter(key: 'sourceOfFunds')]
#[QueryParameter(key: 'averageMonthlyIncome')]
#[QueryParameter(key: 'contactName')]
#[QueryParameter(key: 'contactTitle')]
#[QueryParameter(key: 'contactForname')]
#[QueryParameter(key: 'contactPhone1')]
#[QueryParameter(key: 'contactEmail')]
#[QueryParameter(key: 'contactPhone2')]
#[QueryParameter(key: 'contactPhone3')]
#[QueryParameter(key: 'contactPhone4')]
#[QueryParameter(key: 'prospectNumber')]
#[QueryParameter(key: 'clientStatus')]
#[QueryParameter(key: 'contactDetailsModif')]
#[QueryParameter(key: 'personalDetailsModif')]
#[QueryParameter(key: 'employmentModif')]
#[QueryParameter(key: 'drivingLicence')]
#[QueryParameter(key: 'maritalStatus')]
#[QueryParameter(key: 'children')]
#[QueryParameter(key: 'clientSince')]
#[QueryParameter(key: 'contactRemarks')]
#[QueryParameter(key: 'drivingRemarks')]
class CustomerSearch
{
    public function __construct(
        public ?int $id = null,
        public ?string $title = null, // Changé de PersonTitle à string
        public ?string $surname = null,
        public ?string $forename = null,
        public ?string $crmClientRef = null,
        public ?string $swanClientRef = null,
        public ?string $spouseFullName = null,
        public ?string $dtClientRef = null,
        public ?string $street = null,
        public ?string $street2 = null,
        public ?string $town = null,
        public ?string $zipCode = null,
        public ?string $nationalId = null,
        public ?\DateTimeInterface $dateOfBirth = null,
        public ?string $nationality = null,
        public ?string $passportNo = null,
        public ?string $phone1 = null,
        public ?string $phone2 = null,
        public ?string $phone3 = null,
        public ?string $phone4 = null,
        public ?string $emailAddress1 = null,
        public ?string $kycIndicator = null,
        public ?string $employmentStatus = null,
        public ?string $jobTitle = null,
        public ?string $employerName = null,
        public ?string $employerAddress = null,
        public ?string $brn = null,
        public ?string $sourceOfFunds = null,
        public ?float $averageMonthlyIncome = null,
        public ?string $contactName = null,
        public ?string $contactTitle = null,
        public ?string $contactForname = null,
        public ?string $contactPhone1 = null,
        public ?string $contactEmail = null,
        public ?string $contactPhone2 = null,
        public ?string $contactPhone3 = null,
        public ?string $contactPhone4 = null,
        public ?string $prospectNumber = null,
        public ?string $clientStatus = null,
        public ?string $contactDetailsModif = null,
        public ?string $personalDetailsModif = null,
        public ?string $employmentModif = null,
        public ?string $drivingLicence = null,
        public ?string $maritalStatus = null,
        public ?string $children = null,
        public ?\DateTimeInterface $clientSince = null,
        public ?string $contactRemarks = null,
        public ?string $drivingRemarks = null
    ) {
    }

    public static function mapFromClient(Clients $client): CustomerSearch
    {
        return new CustomerSearch(
            id: $client->getId(),
            title: $client->getTitle(), // Plus de conversion PersonTitle::tryFrom
            surname: $client->getSurname(),
            forename: $client->getForename(),
            crmClientRef: $client->getCrmClientRef(),
            swanClientRef: $client->getSwanClientRef(),
            spouseFullName: $client->getSpouseFullName(),
            dtClientRef: $client->getDtClientRef(),
            street: $client->getStreet(),
            street2: $client->getStreet2(),
            town: $client->getTown(),
            zipCode: $client->getZipCode(),
            nationalId: $client->getNationalId(),
            dateOfBirth: $client->getDateOfBirth(),
            nationality: $client->getNationality(),
            passportNo: $client->getPassportNo(),
            phone1: $client->getPhone1(),
            phone2: $client->getPhone2(),
            phone3: $client->getPhone3(),
            phone4: $client->getPhone4(),
            emailAddress1: $client->getEmailAddress1(),
            kycIndicator: $client->getKycIndicator(),
            employmentStatus: $client->getEmploymentStatus(),
            jobTitle: $client->getJobTitle(),
            employerName: $client->getEmployerName(),
            employerAddress: $client->getEmployerAddress(),
            brn: $client->getBrn(),
            sourceOfFunds: $client->getSourceOfFunds(),
            averageMonthlyIncome: $client->getAverageMonthlyIncome(),
            contactName: $client->getContactName(),
            contactTitle: $client->getContactTitle(),
            contactForname: $client->getContactForname(),
            contactPhone1: $client->getContactPhone1(),
            contactEmail: $client->getContactEmail(),
            contactPhone2: $client->getContactPhone2(),
            contactPhone3: $client->getContactPhone3(),
            contactPhone4: $client->getContactPhone4(),
            prospectNumber: $client->getProspectNumber(),
            clientStatus: $client->getClientStatus(),
            contactDetailsModif: $client->getContactDetailsModif(),
            personalDetailsModif: $client->getPersonalDetailsModif(),
            employmentModif: $client->getEmploymentModif(),
            drivingLicence: $client->getDrivingLicence(),
            maritalStatus: $client->getMaritalStatus(),
            children: $client->getChildren(),
            clientSince: $client->getClientSince(),
            contactRemarks: $client->getContactRemarks(),
            drivingRemarks: $client->getDrivingRemarks()
        );
    }
}