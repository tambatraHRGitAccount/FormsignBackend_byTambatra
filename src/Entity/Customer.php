<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\Enum\CustomerStatus;
use App\Enum\KycIndicator;
use App\Enum\MaritalStatus;
use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => ['person:read', 'customer:read']]),
        new GetCollection(normalizationContext: ['groups' => ['person:read', 'customer:read']]),
        new Post(
            input: \App\Dto\CustomerDto::class,
            output: \App\Dto\CustomerDto::class,
            denormalizationContext: ['groups' => ['person:write', 'customer:write']],
            validationContext: ['groups' => ['Default', 'create']],
            processor: \App\State\CustomerProcessor::class
        ),
        new Put(
            input: \App\Dto\CustomerDto::class,
            output: \App\Dto\CustomerDto::class,
            denormalizationContext: ['groups' => ['person:write', 'customer:write']],
            validationContext: ['groups' => ['Default', 'update']],
            processor: \App\State\CustomerProcessor::class
        ),
        new Delete(),
    ]
)]
class Customer extends Person
{
    #[ORM\Column(nullable: true, enumType: CustomerStatus::class)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\NotNull(groups: ['create'])]
    private ?CustomerStatus $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    private ?string $remark = null;

    #[ORM\ManyToOne(cascade: ['persist'])]
    #[Groups(['customer:read', 'customer:write'])]
    private ?Person $personToContact = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 100)]
    private ?string $crmClientRef = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 50)]
    private ?string $swanClientRef = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    private ?string $dtclientRef = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 150)]
    private ?string $jobTitle = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 150)]
    private ?string $vanillaLoversLtd = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 150)]
    private ?string $employerAddress = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 150)]
    private ?string $brn = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    private ?string $sourceOfFunds = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\PositiveOrZero]
    private ?int $averageMonthlyIncome = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Positive]
    private ?int $drivingLicence = null;

    #[ORM\Column(nullable: true, enumType: MaritalStatus::class)]
    #[Groups(['customer:read', 'customer:write'])]
    private ?MaritalStatus $maritalStatus = null;

    #[ORM\Column(nullable: true, enumType: KycIndicator::class)]
    #[Groups(['customer:read', 'customer:write'])]
    private ?KycIndicator $kycIndicator = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Positive]
    private ?int $prospectNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['customer:read', 'customer:write'])]
    #[Assert\Length(max: 255)]
    private ?string $employerName = null;

    #[ORM\ManyToOne(cascade: ['persist'])]
    #[Groups(['customer:read', 'customer:write'])]
    private ?Person $spouse = null;

    /**
     * @var Collection<int, Document>
     */
    #[ORM\OneToMany(targetEntity: Document::class, mappedBy: 'customer')]
    #[Groups(['customer:read'])]
    private Collection $documents;

    public function __construct()
    {
        parent::__construct();
        $this->documents = new ArrayCollection();
        $this->discr = 'customer';
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

    public function getDtclientRef(): ?string
    {
        return $this->dtclientRef;
    }

    public function setDtclientRef(?string $dtclientRef): static
    {
        $this->dtclientRef = $dtclientRef;
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

    public function getAverageMonthlyIncome(): ?int
    {
        return $this->averageMonthlyIncome;
    }

    public function setAverageMonthlyIncome(?int $averageMonthlyIncome): static
    {
        $this->averageMonthlyIncome = $averageMonthlyIncome;
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

    public function checks(): bool
    {
        return $this->prospectNumber !== null;
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
            if ($document->getCustomer() === $this) {
                $document->setCustomer(null);
            }
        }
        return $this;
    }
}