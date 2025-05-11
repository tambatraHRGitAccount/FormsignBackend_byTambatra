<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\AuthorisationDto;
use App\State\AuthorisationProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'authorisation')]
#[ApiResource(
    operations: [
        new Get(
            output: AuthorisationDto::class
        ),
        new GetCollection(
            output: AuthorisationDto::class
        ),
        new Post(
            input: AuthorisationDto::class,
            output: AuthorisationDto::class,
            processor: AuthorisationProcessor::class
        ),
        new Put(
            input: AuthorisationDto::class,
            output: AuthorisationDto::class,
            processor: AuthorisationProcessor::class
        ),
        new Delete(
            processor: AuthorisationProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['authorisation:read']],
    denormalizationContext: ['groups' => ['authorisation:write']]
)]
class Authorisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'ID_auth')]
    private ?int $idAuth = null;

    #[ORM\Column(type: 'string', length: 10, nullable: true, name: 'Title_AuthPerson', options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $titleAuthPerson = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true, name: 'Surname_AuthPerson', options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $surnameAuthPerson = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, name: 'Forename_AuthPerson', options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $forenameAuthPerson = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, name: 'Job_Title_AuthPerson', options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $jobTitleAuthPerson = null;

    #[ORM\Column(type: 'string', length: 15, nullable: true, name: 'Phone1_AuthPerson', options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $phone1AuthPerson = null;

    #[ORM\Column(type: 'string', length: 15, nullable: true, name: 'Phone2_AuthPerson', options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $phone2AuthPerson = null;

    #[ORM\Column(type: 'string', length: 15, nullable: true, name: 'Phone3_AuthPerson', options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $phone3AuthPerson = null;

    #[ORM\Column(type: 'string', length: 15, nullable: true, name: 'Phone4_AuthPerson', options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $phone4AuthPerson = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, name: 'Email_Address_1_AuthPerson', options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $emailAddress1AuthPerson = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CRMClientRef', options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $crmClientRef = null;

    public function getIdAuth(): ?int
    {
        return $this->idAuth;
    }

    public function getTitleAuthPerson(): ?string
    {
        return $this->titleAuthPerson;
    }

    public function setTitleAuthPerson(?string $titleAuthPerson): self
    {
        $this->titleAuthPerson = $titleAuthPerson;
        return $this;
    }

    public function getSurnameAuthPerson(): ?string
    {
        return $this->surnameAuthPerson;
    }

    public function setSurnameAuthPerson(?string $surnameAuthPerson): self
    {
        $this->surnameAuthPerson = $surnameAuthPerson;
        return $this;
    }

    public function getForenameAuthPerson(): ?string
    {
        return $this->forenameAuthPerson;
    }

    public function setForenameAuthPerson(?string $forenameAuthPerson): self
    {
        $this->forenameAuthPerson = $forenameAuthPerson;
        return $this;
    }

    public function getJobTitleAuthPerson(): ?string
    {
        return $this->jobTitleAuthPerson;
    }

    public function setJobTitleAuthPerson(?string $jobTitleAuthPerson): self
    {
        $this->jobTitleAuthPerson = $jobTitleAuthPerson;
        return $this;
    }

    public function getPhone1AuthPerson(): ?string
    {
        return $this->phone1AuthPerson;
    }

    public function setPhone1AuthPerson(?string $phone1AuthPerson): self
    {
        $this->phone1AuthPerson = $phone1AuthPerson;
        return $this;
    }

    public function getPhone2AuthPerson(): ?string
    {
        return $this->phone2AuthPerson;
    }

    public function setPhone2AuthPerson(?string $phone2AuthPerson): self
    {
        $this->phone2AuthPerson = $phone2AuthPerson;
        return $this;
    }

    public function getPhone3AuthPerson(): ?string
    {
        return $this->phone3AuthPerson;
    }

    public function setPhone3AuthPerson(?string $phone3AuthPerson): self
    {
        $this->phone3AuthPerson = $phone3AuthPerson;
        return $this;
    }

    public function getPhone4AuthPerson(): ?string
    {
        return $this->phone4AuthPerson;
    }

    public function setPhone4AuthPerson(?string $phone4AuthPerson): self
    {
        $this->phone4AuthPerson = $phone4AuthPerson;
        return $this;
    }

    public function getEmailAddress1AuthPerson(): ?string
    {
        return $this->emailAddress1AuthPerson;
    }

    public function setEmailAddress1AuthPerson(?string $emailAddress1AuthPerson): self
    {
        $this->emailAddress1AuthPerson = $emailAddress1AuthPerson;
        return $this;
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
}