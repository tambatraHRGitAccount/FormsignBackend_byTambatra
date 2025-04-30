<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Enum\CustomerStatus;
use App\Enum\KycIndicator;
use App\Enum\MaritalStatus;
use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
#[ApiResource()]
class Customer extends Person
{
    #[ORM\Column(nullable: true, enumType: CustomerStatus::class)]
    private ?CustomerStatus $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $remark = null;

    #[ORM\ManyToOne(cascade: ["persist"])]
    private ?Person $personToContact = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $crmClientRef = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $swanClientRef = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DTClientRef = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $jobTitle = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $vanillaLoversLtd = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $employerAddress = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $brn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sourceOfFunds = null;

    #[ORM\Column(nullable: true)]
    private ?int $averageMontlyIncome = null;

    #[ORM\Column(nullable: true)]
    private ?int $drivingLicence = null;

    #[ORM\Column(nullable: true, enumType: MaritalStatus::class)]
    private ?MaritalStatus $maritalStatus = null;

    #[ORM\Column(nullable: true, enumType: KycIndicator::class)]
    private ?KycIndicator $kycIndicator = null;

    #[ORM\Column(nullable: true)]
    private ?int $prospectNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $employerName = null;

    #[ORM\ManyToOne]
    private ?Person $spouse = null;

    /**
     * @var Collection<int, Document>
     */
    #[ORM\OneToMany(targetEntity: Document::class, mappedBy: 'customer')]
    private Collection $documents;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
    }

    public function getStatus(): ?CustomerStatus
    {
        return $this->status;
    }

    public function setStatus(?CustomerStatus $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function setRemark(?string $remark): static
    {
        $this->remark = $remark;

        return $this;
    }

    public function getPersonToContact(): ?Person
    {
        return $this->personToContact;
    }

    public function setPersonToContact(?Person $personToContact): static
    {
        $this->personToContact = $personToContact;

        return $this;
    }

    public function mapToPerson(): Person
    {
        $person = new Person();

        $person->setSurname($this->getSurname());
        $person->setTitle($this->getTitle());
        $person->setForename($this->getForename());
        $person->setStreet($this->getStreet());
        $person->setStreet2($this->getStreet2());
        $person->setTown($this->getTown());
        $person->setZipCode($this->getZipCode());
        $person->setNationalId($this->getNationalId());
        $person->setDateOfBirth($this->getDateOfBirth());
        $person->setNationality($this->getNationalId());
        $person->setPassport($this->getPassport());
        $person->setPhone1($this->getPhone1());
        $person->setPhone2($this->getPhone2());
        $person->setPhone3($this->getPhone3());
        $person->setPhone4($this->getPhone4());
        $person->setEmail($this->getEmail());

        return $person;
    }

    public function getCrmClientRef(): ?string
    {
        return $this->crmClientRef;
    }

    public function setCrmClientRef(?string $crmClientRef): static
    {
        $this->crmClientRef = $crmClientRef;

        return $this;
    }

    public function getSwanClientRef(): ?string
    {
        return $this->swanClientRef;
    }

    public function setSwanClientRef(?string $swanClientRef): static
    {
        $this->swanClientRef = $swanClientRef;

        return $this;
    }

    public function getDTClientRef(): ?string
    {
        return $this->DTClientRef;
    }

    public function setDTClientRef(?string $DTClientRef): static
    {
        $this->DTClientRef = $DTClientRef;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(?string $jobTitle): static
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getVanillaLoversLtd(): ?string
    {
        return $this->vanillaLoversLtd;
    }

    public function setVanillaLoversLtd(?string $vanillaLoversLtd): static
    {
        $this->vanillaLoversLtd = $vanillaLoversLtd;

        return $this;
    }

    public function getEmployerAddress(): ?string
    {
        return $this->employerAddress;
    }

    public function setEmployerAddress(?string $employerAddress): static
    {
        $this->employerAddress = $employerAddress;

        return $this;
    }

    public function getBrn(): ?string
    {
        return $this->brn;
    }

    public function setBrn(?string $brn): static
    {
        $this->brn = $brn;

        return $this;
    }

    public function getSourceOfFunds(): ?string
    {
        return $this->sourceOfFunds;
    }

    public function setSourceOfFunds(?string $sourceOfFunds): static
    {
        $this->sourceOfFunds = $sourceOfFunds;

        return $this;
    }

    public function getAverageMontlyIncome(): ?int
    {
        return $this->averageMontlyIncome;
    }

    public function setAverageMontlyIncome(?int $averageMontlyIncome): static
    {
        $this->averageMontlyIncome = $averageMontlyIncome;

        return $this;
    }

    public function getDrivingLicence(): ?int
    {
        return $this->drivingLicence;
    }

    public function setDrivingLicence(?int $drivingLicence): static
    {
        $this->drivingLicence = $drivingLicence;

        return $this;
    }

    public function getMaritalStatus(): ?MaritalStatus
    {
        return $this->maritalStatus;
    }

    public function setMaritalStatus(?MaritalStatus $maritalStatus): static
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    public function getKycIndicator(): ?KycIndicator
    {
        return $this->kycIndicator;
    }

    public function setKycIndicator(?KycIndicator $kycIndicator): static
    {
        $this->kycIndicator = $kycIndicator;

        return $this;
    }

    public function getProspectNumber(): ?int
    {
        return $this->prospectNumber;
    }

    public function setProspectNumber(?int $prospectNumber): static
    {
        $this->prospectNumber = $prospectNumber;

        return $this;
    }

    public function getEmployerName(): ?string
    {
        return $this->employerName;
    }

    public function setEmployerName(?string $employerName): static
    {
        $this->employerName = $employerName;

        return $this;
    }

    public function getSpouse(): ?Person
    {
        return $this->spouse;
    }

    public function setSpouse(?Person $spouse): static
    {
        $this->spouse = $spouse;

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): static
    {
        if (!$this->documents->contains($document)) {
            $this->documents->add($document);
            $document->setCustomer($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): static
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getCustomer() === $this) {
                $document->setCustomer(null);
            }
        }

        return $this;
    }

}
