<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'name_autocorrect_save_failures')]
#[ORM\Index(columns: ['Object_Name', 'Time'], name: 'name_autocorrect_pk')]
class NameAutocorrectSaveFailures
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $objectName = null;

    #[ORM\Id]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $time = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $objectType = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $failureReason = null;

    public function getObjectName(): ?string
    {
        return $this->objectName;
    }

    public function setObjectName(?string $objectName): self
    {
        $this->objectName = $objectName;
        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(?\DateTimeInterface $time): self
    {
        $this->time = $time;
        return $this;
    }

    public function getObjectType(): ?string
    {
        return $this->objectType;
    }

    public function setObjectType(?string $objectType): self
    {
        $this->objectType = $objectType;
        return $this;
    }

    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }

    public function setFailureReason(?string $failureReason): self
    {
        $this->failureReason = $failureReason;
        return $this;
    }
}