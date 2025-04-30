<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Enum\ModeOfPayment;
use App\Repository\PaymentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
#[ApiResource]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $insurancePeriodFrom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $insurancePeriodTo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vehicleNumber = null;

    #[ORM\Column(nullable: true)]
    private ?int $policyNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $remarks = null;

    #[ORM\Column(nullable: true)]
    private ?float $amountRs = null;

    #[ORM\Column(nullable: true, enumType: ModeOfPayment::class)]
    private ?ModeOfPayment $modeOfPayment = null;

    /**
     * @var Collection<int, PaymentChildren>
     */
    #[ORM\OneToMany(targetEntity: PaymentChildren::class, mappedBy: 'payment')]
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

    public function getAmountRs(): ?float
    {
        return $this->amountRs;
    }

    public function setAmountRs(?float $amountRs): static
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
            // set the owning side to null (unless already changed)
            if ($paymentChildren->getPayment() === $this) {
                $paymentChildren->setPayment(null);
            }
        }

        return $this;
    }

}
