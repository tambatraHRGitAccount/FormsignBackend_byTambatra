<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Enum\PersonTitle;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "discr", type: "string")]
#[ORM\DiscriminatorMap(["person" => Person::class, "customer" => Customer::class])]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => ['person:read']]),
        new GetCollection(normalizationContext: ['groups' => ['person:read']]),
    ]
)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['person:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 255)]
    private ?string $surname = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 255)]
    private ?string $forename = null;

    #[ORM\Column(nullable: true, enumType: PersonTitle::class)]
    #[Groups(['person:read', 'person:write'])]
    private ?PersonTitle $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 255)]
    private ?string $street = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 255)]
    private ?string $street2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 255)]
    private ?string $town = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 20)]
    private ?string $zipCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 255)]
    private ?string $nationalId = null;

    #[ORM\Column(type: "date", nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    private ?\DateTimeInterface $dateOfBirth = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 255)]
    private ?string $nationality = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 255)]
    private ?string $passport = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 20)]
    private ?string $phone1 = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 100)]
    private ?string $phone2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 100)]
    private ?string $phone3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Length(max: 100)]
    private ?string $phone4 = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['person:read', 'person:write'])]
    #[Assert\Email]
    private ?string $email = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): static
    {
        $this->surname = $surname;
        return $this;
    }

    public function getForename(): ?string
    {
        return $this->forename;
    }

    public function setForename(?string $forename): static
    {
        $this->forename = $forename;
        return $this;
    }

    public function getTitle(): ?PersonTitle
    {
        return $this->title;
    }

    public function setTitle(?PersonTitle $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): static
    {
        $this->street = $street;
        return $this;
    }

    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    public function setStreet2(?string $street2): static
    {
        $this->street2 = $street2;
        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(?string $town): static
    {
        $this->town = $town;
        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): static
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function getNationalId(): ?string
    {
        return $this->nationalId;
    }

    public function setNationalId(?string $nationalId): static
    {
        $this->nationalId = $nationalId;
        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeInterface $dateOfBirth): static
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): static
    {
        $this->nationality = $nationality;
        return $this;
    }

    public function getPassport(): ?string
    {
        return $this->passport;
    }

    public function setPassport(?string $passport): static
    {
        $this->passport = $passport;
        return $this;
    }

    public function getPhone1(): ?string
    {
        return $this->phone1;
    }

    public function setPhone1(?string $phone1): static
    {
        $this->phone1 = $phone1;
        return $this;
    }

    public function getPhone2(): ?string
    {
        return $this->phone2;
    }

    public function setPhone2(?string $phone2): static
    {
        $this->phone2 = $phone2;
        return $this;
    }

    public function getPhone3(): ?string
    {
        return $this->phone3;
    }

    public function setPhone3(?string $phone3): static
    {
        $this->phone3 = $phone3;
        return $this;
    }

    public function getPhone4(): ?string
    {
        return $this->phone4;
    }

    public function setPhone4(?string $phone4): static
    {
        $this->phone4 = $phone4;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;
        return $this;
    }
}