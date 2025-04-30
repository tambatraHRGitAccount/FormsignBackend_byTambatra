<?php

namespace App\Entity;

use App\Enum\ModeOfPayment;
use App\Repository\PaymentChildrenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentChildrenRepository::class)]
class PaymentChildren
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'paymentChildrens')]
    private ?Payment $payment = null;

    #[ORM\Column(nullable: true, enumType: ModeOfPayment::class)]
    private ?ModeOfPayment $modeOfPayment = null;

    #[ORM\Column(nullable: true)]
    private ?float $amountToAllocate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): static
    {
        $this->payment = $payment;

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

    public function getAmountToAllocate(): ?float
    {
        return $this->amountToAllocate;
    }

    public function setAmountToAllocate(?float $amountToAllocate): static
    {
        $this->amountToAllocate = $amountToAllocate;

        return $this;
    }
}
