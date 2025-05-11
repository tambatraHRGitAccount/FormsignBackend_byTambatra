<?php

namespace App\ApiResource;

use App\Entity\CompanyDetails;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

class CompanyDetailsSearch
{
    #[Groups(['company_details:read'])]
    public ?int $id = null;

    #[Groups(['company_details:read'])]
    #[SerializedName('CRMClientRef')]
    public ?string $CRMClientRef = null;

    #[Groups(['company_details:read'])]
    #[SerializedName('BRN')]
    public ?string $BRN = null;

    #[Groups(['company_details:read'])]
    #[SerializedName('Source_of_Funds')]
    public ?string $sourceOfFunds = null;

    #[Groups(['company_details:read'])]
    #[SerializedName('Nature_of_Business')]
    public ?string $natureOfBusiness = null;

    #[Groups(['company_details:read'])]
    #[SerializedName('Employer_Address')]
    public ?string $employerAddress = null;

    #[Groups(['company_details:read'])]
    #[SerializedName('created_at')]
    public ?\DateTimeInterface $createdAt = null;

    #[Groups(['company_details:read'])]
    #[SerializedName('updated_at')]
    public ?\DateTimeInterface $updatedAt = null;

    /**
     * Maps a CompanyDetails entity to a CompanyDetailsSearch object.
     *
     * @param CompanyDetails $companyDetails
     * @return static
     */
    public static function mapFromCompanyDetails(CompanyDetails $companyDetails): self
    {
        $search = new self();
        $search->id = $companyDetails->getId();
        $search->CRMClientRef = $companyDetails->getCRMClientRef();
        $search->BRN = $companyDetails->getBRN();
        $search->sourceOfFunds = $companyDetails->getSourceOfFunds();
        $search->natureOfBusiness = $companyDetails->getNatureOfBusiness();
        $search->employerAddress = $companyDetails->getEmployerAddress();
        $search->createdAt = $companyDetails->getCreatedAt();
        $search->updatedAt = $companyDetails->getUpdatedAt();

        return $search;
    }
}