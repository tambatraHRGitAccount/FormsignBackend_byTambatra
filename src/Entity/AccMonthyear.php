<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'acc_monthyear')]
class AccMonthyear
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $status = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $accMonth = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $accYear = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getAccMonth(): ?string
    {
        return $this->accMonth;
    }

    public function setAccMonth(?string $accMonth): self
    {
        $this->accMonth = $accMonth;
        return $this;
    }

    public function getAccYear(): ?string
    {
        return $this->accYear;
    }

    public function setAccYear(?string $accYear): self
    {
        $this->accYear = $accYear;
        return $this;
    }
}