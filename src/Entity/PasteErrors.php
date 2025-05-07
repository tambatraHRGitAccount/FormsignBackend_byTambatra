<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'paste_errors')]
class PasteErrors
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Clients::class, inversedBy: 'pasteErrors')]
    #[ORM\JoinColumn(name: 'CRMClientRef', referencedColumnName: 'crmClientRef', nullable: false, onDelete: 'CASCADE')]
    private ?Clients $client = null;

    #[ORM\ManyToOne(targetEntity: Policies::class, inversedBy: 'pasteErrors')]
    #[ORM\JoinColumn(name: 'DocPol', referencedColumnName: 'policy', nullable: false, onDelete: 'CASCADE')]
    private ?Policies $docPol = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $crmFile = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $docName = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $docInstruction = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $docShortName = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $docDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;
        return $this;
    }

    public function getDocPol(): ?Policies
    {
        return $this->docPol;
    }

    public function setDocPol(?Policies $docPol): self
    {
        $this->docPol = $docPol;
        return $this;
    }

    public function getCrmFile(): ?string
    {
        return $this->crmFile;
    }

    public function setCrmFile(?string $crmFile): self
    {
        $this->crmFile = $crmFile;
        return $this;
    }

    public function getDocName(): ?string
    {
        return $this->docName;
    }

    public function setDocName(?string $docName): self
    {
        $this->docName = $docName;
        return $this;
    }

    public function getDocInstruction(): ?string
    {
        return $this->docInstruction;
    }

    public function setDocInstruction(?string $docInstruction): self
    {
        $this->docInstruction = $docInstruction;
        return $this;
    }

    public function getDocShortName(): ?string
    {
        return $this->docShortName;
    }

    public function setDocShortName(?string $docShortName): self
    {
        $this->docShortName = $docShortName;
        return $this;
    }

    public function getDocDate(): ?string
    {
        return $this->docDate;
    }

    public function setDocDate(?string $docDate): self
    {
        $this->docDate = $docDate;
        return $this;
    }
}