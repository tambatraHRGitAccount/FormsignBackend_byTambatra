<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\DocsDto;
use App\State\DocsProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'docs')]
#[ApiResource(
    operations: [
        new Get(output: DocsDto::class),
        new GetCollection(output: DocsDto::class),
        new Post(input: DocsDto::class, output: DocsDto::class, processor: DocsProcessor::class),
        new Put(input: DocsDto::class, output: DocsDto::class, processor: DocsProcessor::class),
        new Delete(processor: DocsProcessor::class),
    ],
    normalizationContext: ['groups' => ['docs:read']],
    denormalizationContext: ['groups' => ['docs:write']]
)]
class Docs
{
    #[ORM\Id]
    #[ORM\Column(type: 'bigint')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, name: 'CRMClientRef')]
    private ?string $crmClientRef = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CRMFile')]
    private ?string $crmFile = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'DocName')]
    private ?string $docName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'DocPol')]
    private ?string $docPol = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'DocInstruction')]
    private ?string $docInstruction = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'DocShortName')]
    private ?string $docShortName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'base64File')]
    private ?string $base64File = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'filePath')]
    private ?string $filePath = null; // Nouvelle propriété pour le chemin du fichier

    #[ORM\Column(type: 'datetime', nullable: true, name: 'DocDate')]
    private ?\DateTimeInterface $docDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrmClientRef(): ?string
    {
        return $this->crmClientRef;
    }

    public function setCrmClientRef(?string $crmClientRef): self
    {
        $this->crmClientRef = $crmClientRef;
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

    public function getDocPol(): ?string
    {
        return $this->docPol;
    }

    public function setDocPol(?string $docPol): self
    {
        $this->docPol = $docPol;
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

    public function getBase64File(): ?string
    {
        return $this->base64File;
    }

    public function setBase64File(?string $base64File): self
    {
        $this->base64File = $base64File;
        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(?string $filePath): self
    {
        $this->filePath = $filePath;
        return $this;
    }

    public function getDocDate(): ?\DateTimeInterface
    {
        return $this->docDate;
    }

    public function setDocDate(?\DateTimeInterface $docDate): self
    {
        $this->docDate = $docDate;
        return $this;
    }
}