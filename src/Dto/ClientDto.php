<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class ClientDto
{
    #[Groups(['client:read'])]
    #[SerializedName('id')]
    public ?int $id = null;

    #[Assert\Length(max: 255)]
    #[Assert\Regex(pattern: '/^CRM[0-9]{8,}$/', message: 'CRMClientRef must start with "CRM" followed by 8 or more digits', match: true)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $crmClientRef = null;

    #[Assert\Length(max: 255)]
    #[Assert\Regex(pattern: '/^(P[0-9]{8,}|[0-9]{8,})$/', message: 'SwanClientRef must be 8 or more digits, optionally starting with "P"')]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('SwanClientRef')]
    public ?string $swanClientRef = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Title')]
    public ?string $title = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Surname')]
    public ?string $surname = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Forename')]
    public ?string $forename = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Spouse_Full_Name')]
    public ?string $spouseFullName = null;

    #[Assert\Length(max: 255)]
    #[Assert\Regex(pattern: '/^P[0-9]{8,}$/', message: 'DTClientRef must start with "P" followed by 8 or more digits')]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('DTClientRef')]
    public ?string $dtClientRef = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Street')]
    public ?string $street = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Street2')]
    public ?string $street2 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Town')]
    public ?string $town = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('ZIP_Code')]
    public ?string $zipCode = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('National_ID')]
    public ?string $nationalId = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'Date_Of_Birth must be in YYYY-MM-DD format')]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Date_Of_Birth')]
    public ?string $dateOfBirth = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Nationality')]
    public ?string $nationality = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Passport_No')]
    public ?string $passportNo = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Phone1')]
    public ?string $phone1 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Phone2')]
    public ?string $phone2 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Phone3')]
    public ?string $phone3 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Phone4')]
    public ?string $phone4 = null;

    #[Assert\Email]
    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Email_Address_1')]
    public ?string $emailAddress1 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('KYC_Indicator')]
    public ?string $kycIndicator = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Employment_Status')]
    public ?string $employmentStatus = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Job_Title')]
    public ?string $jobTitle = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Employer_Name')]
    public ?string $employerName = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Employer_Address')]
    public ?string $employerAddress = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('BRN')]
    public ?string $brn = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Source_of_Funds')]
    public ?string $sourceOfFunds = null;

    #[Assert\PositiveOrZero]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Average_monthly_income')]
    public ?float $averageMonthlyIncome = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('CONTACT_NAME')]
    public ?string $contactName = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('CONTACT_TITLE')]
    public ?string $contactTitle = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('CONTACT_FORNAME')]
    public ?string $contactForname = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('CONTACT_Phone1')]
    public ?string $contactPhone1 = null;

    #[Assert\Email]
    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('CONTACT_EMAIL')]
    public ?string $contactEmail = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('CONTACT_Phone2')]
    public ?string $contactPhone2 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('CONTACT_Phone3')]
    public ?string $contactPhone3 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('CONTACT_Phone4')]
    public ?string $contactPhone4 = null;

    #[Assert\Length(max: 255)]
    #[Assert\Regex(pattern: '/^[0-9]{8,}$/', message: 'Prospect_Number must be 8 or more digits')]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Prospect_Number')]
    public ?string $prospectNumber = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Client_Status')]
    public ?string $clientStatus = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Contact_Details_modif')]
    public ?string $contactDetailsModif = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Personal_details_modif')]
    public ?string $personalDetailsModif = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Employement_modif')]
    public ?string $employmentModif = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Driving_Licence')]
    public ?string $drivingLicence = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Marital_Status')]
    public ?string $maritalStatus = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Children')]
    public ?string $children = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'Client_Since must be in YYYY-MM-DD format')]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Client_Since')]
    public ?string $clientSince = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Contact_Remarks')]
    public ?string $contactRemarks = null;

    #[Assert\Length(max: 255)]
    #[Groups(['client:read', 'client:write'])]
    #[SerializedName('Driving_Remarks')]
    public ?string $drivingRemarks = null;
}