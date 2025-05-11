<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class CompanyDetailsDto
{
    #[Assert\Length(max: 50)]
    #[Groups(['company_details:read', 'company_details:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $CRMClientRef = null;

    // ... (other fields remain unchanged)
    #[Assert\Length(max: 50)]
    #[Groups(['company_details:read', 'company_details:write'])]
    #[SerializedName('BRN')]
    public ?string $BRN = null;

    #[Assert\Length(max: 100)]
    #[Groups(['company_details:read', 'company_details:write'])]
    #[SerializedName('Source_of_Funds')]
    public ?string $sourceOfFunds = null;

    #[Assert\Length(max: 100)]
    #[Groups(['company_details:read', 'company_details:write'])]
    #[SerializedName('Nature_of_Business')]
    public ?string $natureOfBusiness = null;

    #[Assert\Length(max: 255)]
    #[Groups(['company_details:read', 'company_details:write'])]
    #[SerializedName('Employer_Address')]
    public ?string $employerAddress = null;

    #[Groups(['company_details:read'])]
    #[SerializedName('created_at')]
    public ?\DateTimeInterface $createdAt = null;

    #[Groups(['company_details:read'])]
    #[SerializedName('updated_at')]
    public ?\DateTimeInterface $updatedAt = null;
}