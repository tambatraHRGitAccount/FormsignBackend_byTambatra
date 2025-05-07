<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\ClientDto;
use App\State\ClientProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'clients')]
#[ApiResource(
    operations: [
        new Get(
            output: ClientDto::class
        ),
        new GetCollection(
            output: ClientDto::class
        ),
        new Post(
            input: ClientDto::class,
            output: ClientDto::class,
            processor: ClientProcessor::class
        ),
        new Put(
            input: ClientDto::class,
            output: ClientDto::class,
            processor: ClientProcessor::class
        ),
        new Delete(
            processor: ClientProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['client:read']],
    denormalizationContext: ['groups' => ['client:write']]
)]
class Clients
{
    #[ORM\Id]
    #[ORM\Column(type: 'bigint')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, unique: true, name: 'CRMClientRef')]
    private ?string $crmClientRef = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'SwanClientRef')]
    private ?string $swanClientRef = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Title')]
    private ?string $title = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Surname')]
    private ?string $surname = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Forename')]
    private ?string $forename = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Spouse_Full_Name')]
    private ?string $spouseFullName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'DTClientRef')]
    private ?string $dtClientRef = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Street')]
    private ?string $street = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Street2')]
    private ?string $street2 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Town')]
    private ?string $town = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'ZIP_Code')]
    private ?string $zipCode = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'National_ID')]
    private ?string $nationalId = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'Date_Of_Birth')]
    private ?\DateTimeInterface $dateOfBirth = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Nationality')]
    private ?string $nationality = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Passport_No')]
    private ?string $passportNo = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Phone1')]
    private ?string $phone1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Phone2')]
    private ?string $phone2 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Phone3')]
    private ?string $phone3 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Phone4')]
    private ?string $phone4 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Email_Address_1')]
    private ?string $emailAddress1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'KYC_Indicator')]
    private ?string $kycIndicator = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Employment_Status')]
    private ?string $employmentStatus = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Job_Title')]
    private ?string $jobTitle = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Employer_Name')]
    private ?string $employerName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Employer_Address')]
    private ?string $employerAddress = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'BRN')]
    private ?string $brn = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Source_of_Funds')]
    private ?string $sourceOfFunds = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'Average_monthly_income')]
    private ?float $averageMonthlyIncome = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CONTACT_NAME')]
    private ?string $contactName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CONTACT_TITLE')]
    private ?string $contactTitle = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CONTACT_FORNAME')]
    private ?string $contactForname = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CONTACT_Phone1')]
    private ?string $contactPhone1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CONTACT_EMAIL')]
    private ?string $contactEmail = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CONTACT_Phone2')]
    private ?string $contactPhone2 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CONTACT_Phone3')]
    private ?string $contactPhone3 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CONTACT_Phone4')]
    private ?string $contactPhone4 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Prospect_Number')]
    private ?string $prospectNumber = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Client_Status')]
    private ?string $clientStatus = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Contact_Details_modif')]
    private ?string $contactDetailsModif = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Personal_details_modif')]
    private ?string $personalDetailsModif = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Employement_modif')]
    private ?string $employmentModif = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Driving_Licence')]
    private ?string $drivingLicence = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Marital_Status')]
    private ?string $maritalStatus = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Children')]
    private ?string $children = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'Client_Since')]
    private ?\DateTimeInterface $clientSince = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Contact_Remarks')]
    private ?string $contactRemarks = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Driving_Remarks')]
    private ?string $drivingRemarks = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrmClientRef(): ?string
    {
        return $this->crmClientRef;
    }

    public function setCrmClientRef(?string $crmClientRef): self
    {
        $this->crmClientRef = $crmClientRef;
        return $this;
    }

    public function getSwanClientRef(): ?string
    {
        return $this->swanClientRef;
    }

    public function setSwanClientRef(?string $swanClientRef): self
    {
        $this->swanClientRef = $swanClientRef;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;
        return $this;
    }

    public function getForename(): ?string
    {
        return $this->forename;
    }

    public function setForename(?string $forename): self
    {
        $this->forename = $forename;
        return $this;
    }

    public function getSpouseFullName(): ?string
    {
        return $this->spouseFullName;
    }

    public function setSpouseFullName(?string $spouseFullName): self
    {
        $this->spouseFullName = $spouseFullName;
        return $this;
    }

    public function getDtClientRef(): ?string
    {
        return $this->dtClientRef;
    }

    public function setDtClientRef(?string $dtClientRef): self
    {
        $this->dtClientRef = $dtClientRef;
        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    public function setStreet2(?string $street2): self
    {
        $this->street2 = $street2;
        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(?string $town): self
    {
        $this->town = $town;
        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function getNationalId(): ?string
    {
        return $this->nationalId;
    }

    public function setNationalId(?string $nationalId): self
    {
        $this->nationalId = $nationalId;
        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;
        return $this;
    }

    public function getPassportNo(): ?string
    {
        return $this->passportNo;
    }

    public function setPassportNo(?string $passportNo): self
    {
        $this->passportNo = $passportNo;
        return $this;
    }

    public function getPhone1(): ?string
    {
        return $this->phone1;
    }

    public function setPhone1(?string $phone1): self
    {
        $this->phone1 = $phone1;
        return $this;
    }

    public function getPhone2(): ?string
    {
        return $this->phone2;
    }

    public function setPhone2(?string $phone2): self
    {
        $this->phone2 = $phone2;
        return $this;
    }

    public function getPhone3(): ?string
    {
        return $this->phone3;
    }

    public function setPhone3(?string $phone3): self
    {
        $this->phone3 = $phone3;
        return $this;
    }

    public function getPhone4(): ?string
    {
        return $this->phone4;
    }

    public function setPhone4(?string $phone4): self
    {
        $this->phone4 = $phone4;
        return $this;
    }

    public function getEmailAddress1(): ?string
    {
        return $this->emailAddress1;
    }

    public function setEmailAddress1(?string $emailAddress1): self
    {
        $this->emailAddress1 = $emailAddress1;
        return $this;
    }

    public function getKycIndicator(): ?string
    {
        return $this->kycIndicator;
    }

    public function setKycIndicator(?string $kycIndicator): self
    {
        $this->kycIndicator = $kycIndicator;
        return $this;
    }

    public function getEmploymentStatus(): ?string
    {
        return $this->employmentStatus;
    }

    public function setEmploymentStatus(?string $employmentStatus): self
    {
        $this->employmentStatus = $employmentStatus;
        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(?string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;
        return $this;
    }

    public function getEmployerName(): ?string
    {
        return $this->employerName;
    }

    public function setEmployerName(?string $employerName): self
    {
        $this->employerName = $employerName;
        return $this;
    }

    public function getEmployerAddress(): ?string
    {
        return $this->employerAddress;
    }

    public function setEmployerAddress(?string $employerAddress): self
    {
        $this->employerAddress = $employerAddress;
        return $this;
    }

    public function getBrn(): ?string
    {
        return $this->brn;
    }

    public function setBrn(?string $brn): self
    {
        $this->brn = $brn;
        return $this;
    }

    public function getSourceOfFunds(): ?string
    {
        return $this->sourceOfFunds;
    }

    public function setSourceOfFunds(?string $sourceOfFunds): self
    {
        $this->sourceOfFunds = $sourceOfFunds;
        return $this;
    }

    public function getAverageMonthlyIncome(): ?float
    {
        return $this->averageMonthlyIncome;
    }

    public function setAverageMonthlyIncome(?float $averageMonthlyIncome): self
    {
        $this->averageMonthlyIncome = $averageMonthlyIncome;
        return $this;
    }

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(?string $contactName): self
    {
        $this->contactName = $contactName;
        return $this;
    }

    public function getContactTitle(): ?string
    {
        return $this->contactTitle;
    }

    public function setContactTitle(?string $contactTitle): self
    {
        $this->contactTitle = $contactTitle;
        return $this;
    }

    public function getContactForname(): ?string
    {
        return $this->contactForname;
    }

    public function setContactForname(?string $contactForname): self
    {
        $this->contactForname = $contactForname;
        return $this;
    }

    public function getContactPhone1(): ?string
    {
        return $this->contactPhone1;
    }

    public function setContactPhone1(?string $contactPhone1): self
    {
        $this->contactPhone1 = $contactPhone1;
        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(?string $contactEmail): self
    {
        $this->contactEmail = $contactEmail;
        return $this;
    }

    public function getContactPhone2(): ?string
    {
        return $this->contactPhone2;
    }

    public function setContactPhone2(?string $contactPhone2): self
    {
        $this->contactPhone2 = $contactPhone2;
        return $this;
    }

    public function getContactPhone3(): ?string
    {
        return $this->contactPhone3;
    }

    public function setContactPhone3(?string $contactPhone3): self
    {
        $this->contactPhone3 = $contactPhone3;
        return $this;
    }

    public function getContactPhone4(): ?string
    {
        return $this->contactPhone4;
    }

    public function setContactPhone4(?string $contactPhone4): self
    {
        $this->contactPhone4 = $contactPhone4;
        return $this;
    }

    public function getProspectNumber(): ?string
    {
        return $this->prospectNumber;
    }

    public function setProspectNumber(?string $prospectNumber): self
    {
        $this->prospectNumber = $prospectNumber;
        return $this;
    }

    public function getClientStatus(): ?string
    {
        return $this->clientStatus;
    }

    public function setClientStatus(?string $clientStatus): self
    {
        $this->clientStatus = $clientStatus;
        return $this;
    }

    public function getContactDetailsModif(): ?string
    {
        return $this->contactDetailsModif;
    }

    public function setContactDetailsModif(?string $contactDetailsModif): self
    {
        $this->contactDetailsModif = $contactDetailsModif;
        return $this;
    }

    public function getPersonalDetailsModif(): ?string
    {
        return $this->personalDetailsModif;
    }

    public function setPersonalDetailsModif(?string $personalDetailsModif): self
    {
        $this->personalDetailsModif = $personalDetailsModif;
        return $this;
    }

    public function getEmploymentModif(): ?string
    {
        return $this->employmentModif;
    }

    public function setEmploymentModif(?string $employmentModif): self
    {
        $this->employmentModif = $employmentModif;
        return $this;
    }

    public function getDrivingLicence(): ?string
    {
        return $this->drivingLicence;
    }

    public function setDrivingLicence(?string $drivingLicence): self
    {
        $this->drivingLicence = $drivingLicence;
        return $this;
    }

    public function getMaritalStatus(): ?string
    {
        return $this->maritalStatus;
    }

    public function setMaritalStatus(?string $maritalStatus): self
    {
        $this->maritalStatus = $maritalStatus;
        return $this;
    }

    public function getChildren(): ?string
    {
        return $this->children;
    }

    public function setChildren(?string $children): self
    {
        $this->children = $children;
        return $this;
    }

    public function getClientSince(): ?\DateTimeInterface
    {
        return $this->clientSince;
    }

    public function setClientSince(?\DateTimeInterface $clientSince): self
    {
        $this->clientSince = $clientSince;
        return $this;
    }

    public function getContactRemarks(): ?string
    {
        return $this->contactRemarks;
    }

    public function setContactRemarks(?string $contactRemarks): self
    {
        $this->contactRemarks = $contactRemarks;
        return $this;
    }

    public function getDrivingRemarks(): ?string
    {
        return $this->drivingRemarks;
    }

    public function setDrivingRemarks(?string $drivingRemarks): self
    {
        $this->drivingRemarks = $drivingRemarks;
        return $this;
    }
}