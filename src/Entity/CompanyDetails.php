<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\CompanyDetailsDto;
use App\State\CompanyDetailsProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'company_details')]
#[ORM\Index(columns: ['CRMClientRef'], name: 'idx_CRMClientRef')]
#[ApiResource(
    operations: [
        new Get(
            output: CompanyDetailsDto::class
        ),
        new GetCollection(
            output: CompanyDetailsDto::class
        ),
        new Post(
            input: CompanyDetailsDto::class,
            output: CompanyDetailsDto::class,
            processor: CompanyDetailsProcessor::class
        ),
        new Put(
            input: CompanyDetailsDto::class,
            output: CompanyDetailsDto::class,
            processor: CompanyDetailsProcessor::class
        ),
        new Delete(
            processor: CompanyDetailsProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['company_details:read']],
    denormalizationContext: ['groups' => ['company_details:write']]
)]
class CompanyDetails
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50, name: 'CRMClientRef')]
    private ?string $CRMClientRef = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true, name: 'BRN')]
    private ?string $BRN = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, name: 'Source_of_Funds')]
    private ?string $sourceOfFunds = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, name: 'Nature_of_Business')]
    private ?string $natureOfBusiness = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Employer_Address')]
    private ?string $employerAddress = null;

    #[ORM\Column(type: 'datetime', nullable: true, name: 'created_at')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'datetime', nullable: true, name: 'updated_at')]
    private ?\DateTimeInterface $updatedAt = null;

    // Getters and Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCRMClientRef(): ?string
    {
        return $this->CRMClientRef;
    }

    public function setCRMClientRef(?string $CRMClientRef): self
    {
        $this->CRMClientRef = $CRMClientRef;
        return $this;
    }

    // ... (other getters and setters remain unchanged)
    public function getBRN(): ?string
    {
        return $this->BRN;
    }

    public function setBRN(?string $BRN): self
    {
        $this->BRN = $BRN;
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

    public function getNatureOfBusiness(): ?string
    {
        return $this->natureOfBusiness;
    }

    public function setNatureOfBusiness(?string $natureOfBusiness): self
    {
        $this->natureOfBusiness = $natureOfBusiness;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}