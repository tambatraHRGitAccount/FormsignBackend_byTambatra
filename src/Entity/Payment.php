<?php

namespace App\Entity;

use App\Enum\ModeOfPayment;
use App\Repository\PaymentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => ['payment:read']]),
        new GetCollection(normalizationContext: ['groups' => ['payment:read']]),
        new Post(denormalizationContext: ['groups' => ['payment:write']]),
        new Put(denormalizationContext: ['groups' => ['payment:write']]),
        new Delete(),
    ]
)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['payment:read'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['payment:read', 'payment:write'])]
    private ?\DateTimeInterface $insurancePeriodFrom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(['payment:read', 'payment:write'])]
    private ?\DateTimeInterface $insurancePeriodTo = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['payment:read', 'payment:write'])]
    #[Assert\Length(max: 255)]
    private ?string $vehicleNumber = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['payment:read', 'payment:write'])]
    #[Assert\PositiveOrZero]
    private ?int $policyNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['payment:read', 'payment:write'])]
    #[Assert\Length(max: 255)]
    private ?string $remarks = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    #[Groups(['payment:read', 'payment:write'])]
    #[Assert\PositiveOrZero]
    private ?string $amountRs = null;

    #[ORM\Column(nullable: true, enumType: ModeOfPayment::class)]
    #[Groups(['payment:read', 'payment:write'])]
    private ?ModeOfPayment $modeOfPayment = null;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(name: 'customer_id', referencedColumnName: 'id')]
    #[Groups(['payment:read'])]
    private ?Customer $customer = null;

    /**
     * @var Collection<int, PaymentChildren>
     */
    #[ORM\OneToMany(targetEntity: PaymentChildren::class, mappedBy: 'payment')]
    #[Groups(['payment:read'])]
    private Collection $paymentChildrens;

    public function __construct()
    {
        $this->paymentChildrens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInsurancePeriodFrom(): ?\DateTimeInterface
    {
        return $this->insurancePeriodFrom;
    }

    public function setInsurancePeriodFrom(?\DateTimeInterface $insurancePeriodFrom): static
    {
        $this->insurancePeriodFrom = $insurancePeriodFrom;
        return $this;
    }

    public function getInsurancePeriodTo(): ?\DateTimeInterface
    {
        return $this->insurancePeriodTo;
    }

    public function setInsurancePeriodTo(?\DateTimeInterface $insurancePeriodTo): static
    {
        $this->insurancePeriodTo = $insurancePeriodTo;
        return $this;
    }

    public function getVehicleNumber(): ?string
    {
        return $this->vehicleNumber;
    }

    public function setVehicleNumber(?string $vehicleNumber): static
    {
        $this->vehicleNumber = $vehicleNumber;
        return $this;
    }

    public function getPolicyNumber(): ?int
    {
        return $this->policyNumber;
    }

    public function setPolicyNumber(?int $policyNumber): static
    {
        $this->policyNumber = $policyNumber;
        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(?string $remarks): static
    {
        $this->remarks = $remarks;
        return $this;
    }

    public function getAmountRs(): ?string
    {
        return $this->amountRs;
    }

    public function setAmountRs(?string $amountRs): static
    {
        $this->amountRs = $amountRs;
        return $this;
    }

    public function getModeOfPayment(): ?ModeOfPayment
    {
        return $this->modeOfPayment;
    }

    public function setModeOfPayment(?ModeOfPayment $modeOfPayment): static
    {
        $this->modeOfPayment = $modeOfPayment;
        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): static
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return Collection<int, PaymentChildren>
     */
    public function getPaymentChildrens(): Collection
    {
        return $this->paymentChildrens;
    }

    public function addPaymentChildren(PaymentChildren $paymentChildren): static
    {
        if (!$this->paymentChildrens->contains($paymentChildren)) {
            $this->paymentChildrens->add($paymentChildren);
            $paymentChildren->setPayment($this);
        }
        return $this;
    }

    public function removePaymentChildren(PaymentChildren $paymentChildren): static
    {
        if ($this->paymentChildrens->removeElement($paymentChildren)) {
            if ($paymentChildren->getPayment() === $this) {
                $paymentChildren->setPayment(null);
            }
        }
        return $this;
    }
}