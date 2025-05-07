<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'missing_documents')]
class MissingDocuments
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Clients::class, inversedBy: 'missingDocuments')]
    #[ORM\JoinColumn(name: 'CRMClientRef', referencedColumnName: 'crmClientRef', nullable: false, onDelete: 'CASCADE')]
    private ?Clients $client = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $instruction = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $renewal = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $missingKyc = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $missingDocs = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sentToSwan = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $processed = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $missingEic = null;

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

    public function getInstruction(): ?string
    {
        return $this->instruction;
    }

    public function setInstruction(?string $instruction): self
    {
        $this->instruction = $instruction;
        return $this;
    }

    public function getRenewal(): ?string
    {
        return $this->renewal;
    }

    public function setRenewal(?string $renewal): self
    {
        $this->renewal = $renewal;
        return $this;
    }

    public function getMissingKyc(): ?string
    {
        return $this->missingKyc;
    }

    public function setMissingKyc(?string $missingKyc): self
    {
        $this->missingKyc = $missingKyc;
        return $this;
    }

    public function getMissingDocs(): ?string
    {
        return $this->missingDocs;
    }

    public function setMissingDocs(?string $missingDocs): self
    {
        $this->missingDocs = $missingDocs;
        return $this;
    }

    public function getSentToSwan(): ?int
    {
        return $this->sentToSwan;
    }

    public function setSentToSwan(?int $sentToSwan): self
    {
        $this->sentToSwan = $sentToSwan;
        return $this;
    }

    public function getProcessed(): ?string
    {
        return $this->processed;
    }

    public function setProcessed(?string $processed): self
    {
        $this->processed = $processed;
        return $this;
    }

    public function getMissingEic(): ?string
    {
        return $this->missingEic;
    }

    public function setMissingEic(?string $missingEic): self
    {
        $this->missingEic = $missingEic;
        return $this;
    }
}