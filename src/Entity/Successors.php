<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\SuccessorsDto;
use App\State\SuccessorsProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'successors')]
#[ApiResource(
    operations: [
        new Get(
            output: SuccessorsDto::class
        ),
        new GetCollection(
            output: SuccessorsDto::class
        ),
        new Post(
            input: SuccessorsDto::class,
            output: SuccessorsDto::class,
            processor: SuccessorsProcessor::class
        ),
        new Put(
            input: SuccessorsDto::class,
            output: SuccessorsDto::class,
            processor: SuccessorsProcessor::class
        ),
        new Delete(
            processor: SuccessorsProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['successors:read']],
    denormalizationContext: ['groups' => ['successors:write']]
)]
class Successors
{
    #[ORM\Id]
    #[ORM\Column(type: 'bigint')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, name: 'CRMClientRef')]
    private ?string $crmClientRef = null;

    #[ORM\Column(type: 'string', length: 10, nullable: true, name: 'title')]
    private ?string $title = null;

    #[ORM\Column(type: 'string', length: 100, name: 'surname')]
    private ?string $surname = null;

    #[ORM\Column(type: 'string', length: 100, name: 'forename')]
    private ?string $forename = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'address')]
    private ?string $address = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true, name: 'phone1')]
    private ?string $phone1 = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true, name: 'phone2')]
    private ?string $phone2 = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true, name: 'phone3')]
    private ?string $phone3 = null;

    #[ORM\Column(type: 'string', length: 20, nullable: true, name: 'phone4')]
    private ?string $phone4 = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, name: 'email_address_1')]
    private ?string $emailAddress1 = null;

    #[ORM\Column(type: 'text', nullable: true, name: 'contact_remarks')]
    private ?string $contactRemarks = null;

    #[ORM\Column(type: 'boolean', name: 'is_authorized')]
    private ?bool $isAuthorized = false;

    #[ORM\Column(type: 'datetime', name: 'created_at')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'datetime', name: 'updated_at')]
    private ?\DateTimeInterface $updatedAt = null;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getPhone1(): ?string
    {
        return $this->phone1;
    }

    public function setPhone1(?string $phone1): self
    {
        $this->phone1 = $phone1;
        return $this;
    }

    public function getPhone2(): ?string
    {
        return $this->phone2;
    }

    public function setPhone2(?string $phone2): self
    {
        $this->phone2 = $phone2;
        return $this;
    }

    public function getPhone3(): ?string
    {
        return $this->phone3;
    }

    public function setPhone3(?string $phone3): self
    {
        $this->phone3 = $phone3;
        return $this;
    }

    public function getPhone4(): ?string
    {
        return $this->phone4;
    }

    public function setPhone4(?string $phone4): self
    {
        $this->phone4 = $phone4;
        return $this;
    }

    public function getEmailAddress1(): ?string
    {
        return $this->emailAddress1;
    }

    public function setEmailAddress1(?string $emailAddress1): self
    {
        $this->emailAddress1 = $emailAddress1;
        return $this;
    }

    public function getContactRemarks(): ?string
    {
        return $this->contactRemarks;
    }

    public function setContactRemarks(?string $contactRemarks): self
    {
        $this->contactRemarks = $contactRemarks;
        return $this;
    }

    public function getIsAuthorized(): ?bool
    {
        return $this->isAuthorized;
    }

    public function setIsAuthorized(?bool $isAuthorized): self
    {
        $this->isAuthorized = $isAuthorized;
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