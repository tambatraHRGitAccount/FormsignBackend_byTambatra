<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class FamilyDto
{
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    #[Groups(['family:read', 'family:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $crmClientRef = null;

    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['Spouse', 'Child'], message: 'Type must be either Spouse or Child')]
    #[Groups(['family:read', 'family:write'])]
    #[SerializedName('type')]
    public ?string $type = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['family:read', 'family:write'])]
    #[SerializedName('surname')]
    public ?string $surname = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['family:read', 'family:write'])]
    #[SerializedName('forename')]
    public ?string $forename = null;

    #[Assert\NotBlank]
    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'date_of_birth must be in YYYY-MM-DD format')]
    #[Groups(['family:read', 'family:write'])]
    #[SerializedName('date_of_birth')]
    public ?string $dateOfBirth = null;

    #[Assert\PositiveOrZero]
    #[Groups(['family:read', 'family:write'])]
    #[SerializedName('age')]
    public ?int $age = null;
}