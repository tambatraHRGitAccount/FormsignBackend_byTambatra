<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\FamilyDto;
use App\Enum\FamilyType;
use App\State\FamilyProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'family')]
#[ApiResource(
    operations: [
        new Get(
            output: FamilyDto::class
        ),
        new GetCollection(
            output: FamilyDto::class
        ),
        new Post(
            input: FamilyDto::class,
            output: FamilyDto::class,
            processor: FamilyProcessor::class
        ),
        new Put(
            input: FamilyDto::class,
            output: FamilyDto::class,
            processor: FamilyProcessor::class
        ),
        new Delete(
            processor: FamilyProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['family:read']],
    denormalizationContext: ['groups' => ['family:write']]
)]
class Family
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, unique: true, name: 'CRMClientRef')]
    private ?string $crmClientRef = null;

    #[ORM\Column(type: 'string', enumType: FamilyType::class, name: 'type')]
    private ?FamilyType $type = null;

    #[ORM\Column(type: 'string', length: 100, name: 'surname')]
    private ?string $surname = null;

    #[ORM\Column(type: 'string', length: 100, name: 'forename')]
    private ?string $forename = null;

    #[ORM\Column(type: 'date', name: 'date_of_birth')]
    private ?\DateTimeInterface $dateOfBirth = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'age')]
    private ?int $age = null;

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

    public function getType(): ?FamilyType
    {
        return $this->type;
    }

    public function setType(?FamilyType $type): self
    {
        $this->type = $type;
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

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;
        return $this;
    }
}