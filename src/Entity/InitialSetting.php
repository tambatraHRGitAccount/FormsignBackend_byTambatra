<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\Table(name: 'initialsettings')]
class InitialSetting
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: Document::class)]
    #[ORM\JoinColumn(name: 'document_id', referencedColumnName: 'id', nullable: false)]
    private Document $document;

    #[ORM\Column(type: 'string', length: 50)]
    private string $alignment;

    #[ORM\Column(type: 'integer')]
    private int $y;

    public function __construct()
    {
        $this->id = Uuid::v1()->toRfc4122();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDocument(): Document
    {
        return $this->document;
    }

    public function setDocument(Document $document): self
    {
        $this->document = $document;
        return $this;
    }

    public function getAlignment(): string
    {
        return $this->alignment;
    }

    public function setAlignment(string $alignment): self
    {
        $this->alignment = $alignment;
        return $this;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y): self
    {
        $this->y = $y;
        return $this;
    }
}