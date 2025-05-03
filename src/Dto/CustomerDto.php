<?php

namespace App\Dto;

use App\Enum\CustomerStatus;
use App\Enum\KycIndicator;
use App\Enum\MaritalStatus;
use App\Enum\PersonTitle;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class CustomerDto
{
    #[Groups(['customer:read', 'customer:write'])]
    public ?int $id = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\NotBlank(groups: ['create'])]
    #[Assert\Length(max: 255)]
    public ?string $surname = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\NotBlank(groups: ['create'])]
    #[Assert\Length(max: 255)]
    public ?string $forename = null;

    #[Groups(['customer:read', 'customer:write'])]
    public ?PersonTitle $title = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    public ?string $street = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    public ?string $street2 = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    public ?string $town = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 20)]
    public ?string $zipCode = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    public ?string $nationalId = null;

    #[Groups(['customer:read', 'customer:write'])]
    public ?\DateTimeInterface $dateOfBirth = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    public ?string $nationality = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    public ?string $passport = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\NotBlank(groups: ['create'])]
    #[Assert\Regex(pattern: '/^\+?[1-9]\d{1,14}$/', groups: ['create', 'update'])]
    public ?string $phone1 = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 100)]
    public ?string $phone2 = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 100)]
    public ?string $phone3 = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 100)]
    public ?string $phone4 = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Email(groups: ['create', 'update'])]
    #[Assert\Length(max: 100)]
    public ?string $email = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\NotNull(groups: ['create'])]
    public ?CustomerStatus $status = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    public ?string $remark = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Positive]
    public ?int $personToContactId = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 100)]
    public ?string $crmClientRef = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 50)]
    public ?string $swanClientRef = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    public ?string $dtclientRef = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 150)]
    public ?string $jobTitle = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 150)]
    public ?string $vanillaLoversLtd = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 150)]
    public ?string $employerAddress = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 150)]
    public ?string $brn = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    public ?string $sourceOfFunds = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\PositiveOrZero]
    public ?int $averageMonthlyIncome = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Positive]
    public ?int $drivingLicence = null;

    #[Groups(['customer:read', 'customer:write'])]
    public ?MaritalStatus $maritalStatus = null;

    #[Groups(['customer:read', 'customer:write'])]
    public ?KycIndicator $kycIndicator = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Positive]
    public ?int $prospectNumber = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    public ?string $employerName = null;

    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Positive]
    public ?int $spouseId = null;
}