<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class AuthorisationDto
{
    #[Groups(['authorisation:read'])]
    #[SerializedName('id_auth')]
    public ?int $idAuth = null;

    #[Assert\Length(max: 10)]
    #[Groups(['authorisation:read', 'authorisation:write'])]
    #[SerializedName('Title_AuthPerson')]
    public ?string $titleAuthPerson = null;

    #[Assert\Length(max: 50)]
    #[Groups(['authorisation:read', 'authorisation:write'])]
    #[SerializedName('Surname_AuthPerson')]
    public ?string $surnameAuthPerson = null;

    #[Assert\Length(max: 100)]
    #[Groups(['authorisation:read', 'authorisation:write'])]
    #[SerializedName('Forename_AuthPerson')]
    public ?string $forenameAuthPerson = null;

    #[Assert\Length(max: 100)]
    #[Groups(['authorisation:read', 'authorisation:write'])]
    #[SerializedName('Job_Title_AuthPerson')]
    public ?string $jobTitleAuthPerson = null;

    #[Assert\Length(max: 15)]
    #[Groups(['authorisation:read', 'authorisation:write'])]
    #[SerializedName('Phone1_AuthPerson')]
    public ?string $phone1AuthPerson = null;

    #[Assert\Length(max: 15)]
    #[Groups(['authorisation:read', 'authorisation:write'])]
    #[SerializedName('Phone2_AuthPerson')]
    public ?string $phone2AuthPerson = null;

    #[Assert\Length(max: 15)]
    #[Groups(['authorisation:read', 'authorisation:write'])]
    #[SerializedName('Phone3_AuthPerson')]
    public ?string $phone3AuthPerson = null;

    #[Assert\Length(max: 15)]
    #[Groups(['authorisation:read', 'authorisation:write'])]
    #[SerializedName('Phone4_AuthPerson')]
    public ?string $phone4AuthPerson = null;

    #[Assert\Email(message: 'The email {{ value }} is not a valid email.')]
    #[Assert\Length(max: 100)]
    #[Groups(['authorisation:read', 'authorisation:write'])]
    #[SerializedName('Email_Address_1_AuthPerson')]
    public ?string $emailAddress1AuthPerson = null;

    #[Assert\NotBlank(message: 'CRMClientRef is required')]
    #[Assert\Length(max: 255)]
    #[Assert\Regex(pattern: '/^CRM[0-9]{8,}$/', message: 'CRMClientRef must start with "CRM" followed by 8 or more digits')]
    #[Groups(['authorisation:read', 'authorisation:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $crmClientRef = null;
}