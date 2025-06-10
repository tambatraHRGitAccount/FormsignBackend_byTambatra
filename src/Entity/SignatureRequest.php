<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\SignatureRequestController;

#[ORM\Entity]
#[ORM\Table(name: 'signaturerequests')]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => ['signature_request:read']]),
        new GetCollection(normalizationContext: ['groups' => ['signature_request:read']]),
        new Post(
            uriTemplate: '/signature_request',
            controller: SignatureRequestController::class.'::createSignatureRequest',
            inputFormats: ['json' => ['application/json']],
            deserialize: false,
            normalizationContext: ['groups' => ['signature_request:read']],
            denormalizationContext: ['groups' => ['signature_request:write']],
            description: 'Creates a new signature request',
            processor: \App\State\SignatureRequestProcessor::class
        ),
        new Post(
            uriTemplate: '/signature_request/{signatureRequestId}/activate',
            controller: SignatureRequestController::class.'::activateSignatureRequest',
            inputFormats: ['json' => ['application/json']],
            deserialize: false,
            normalizationContext: ['groups' => ['signature_request:read']],
            description: 'Activates a signature request',
            processor: \App\State\SignatureRequestProcessor::class,
            requirements: ['signatureRequestId' => '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}'],
            uriVariables: [
                'signatureRequestId' => [
                    'from_class' => SignatureRequest::class,
                    'from_property' => 'id',
                    'description' => 'The ID of the signature request',
                    'required' => true,
                    'openapi' => [
                        'type' => 'string',
                        'format' => 'uuid',
                        'description' => 'UUID of the signature request',
                    ],
                ],
            ],
        ),
    ],
    normalizationContext: ['groups' => ['signature_request:read']],
    denormalizationContext: ['groups' => ['signature_request:write']]
)]
class SignatureRequest
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    #[Groups(['signature_request:read'])]
    private string $id;

    #[ORM\ManyToOne(targetEntity: Sender::class)]
    #[ORM\JoinColumn(name: 'sender_id', referencedColumnName: 'id', nullable: false)]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private Sender $sender;

    #[ORM\ManyToOne(targetEntity: Folder::class)]
    #[ORM\JoinColumn(name: 'folder_id', referencedColumnName: 'id', nullable: true)]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private ?Folder $folder = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private ?string $emailMessage = null;

    #[ORM\Column(type: 'date', nullable: true)]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private ?\DateTimeInterface $expirationDate = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private string $timezone = 'Europe/Paris';

    #[ORM\Column(type: 'boolean')]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private bool $signersAllowedToDecline = false;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private string $status = 'draft';

    #[ORM\Column(type: Types::JSON)]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private array $reminderSettings = ['interval_in_days' => 1, 'max_occurrences' => 5];

    #[ORM\Column(type: Types::JSON)]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private array $webhooks = [];

    #[ORM\Column(type: Types::JSON)]
    #[Groups(['signature_request:read', 'signature_request:write'])]
    private array $auditEvents = [];

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['signature_request:read'])]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['signature_request:read'])]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'signatureRequest', targetEntity: Document::class, cascade: ['persist', 'remove'])]
    #[Groups(['signature_request:read'])]
    private Collection $documents;

    #[ORM\OneToMany(mappedBy: 'signatureRequest', targetEntity: Signer::class, cascade: ['persist', 'remove'])]
    #[Groups(['signature_request:read'])]
    private Collection $signers;

    public function __construct()
    {
        $this->id = Uuid::v1()->toRfc4122();
        $this->createdAt = new \DateTime();
        $this->documents = new ArrayCollection();
        $this->signers = new ArrayCollection();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSender(): Sender
    {
        return $this->sender;
    }

    public function setSender(Sender $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function getFolder(): ?Folder
    {
        return $this->folder;
    }

    public function setFolder(?Folder $folder): self
    {
        $this->folder = $folder;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getEmailMessage(): ?string
    {
        return $this->emailMessage;
    }

    public function setEmailMessage(?string $emailMessage): self
    {
        $this->emailMessage = $emailMessage;
        return $this;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?\DateTimeInterface $expirationDate): self
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;
        return $this;
    }

    public function isSignersAllowedToDecline(): bool
    {
        return $this->signersAllowedToDecline;
    }

    public function setSignersAllowedToDecline(bool $signersAllowedToDecline): self
    {
        $this->signersAllowedToDecline = $signersAllowedToDecline;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getReminderSettings(): array
    {
        return $this->reminderSettings;
    }

    public function setReminderSettings(array $reminderSettings): self
    {
        $this->reminderSettings = $reminderSettings;
        return $this;
    }

    public function getWebhooks(): array
    {
        return $this->webhooks;
    }

    public function setWebhooks(array $webhooks): self
    {
        $this->webhooks = $webhooks;
        return $this;
    }

    public function getAuditEvents(): array
    {
        return $this->auditEvents;
    }

    public function setAuditEvents(array $auditEvents): self
    {
        $this->auditEvents = $auditEvents;
        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setSignatureRequest($this);
        }
        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->removeElement($document)) {
            if ($document->getSignatureRequest() === $this) {
                $document->setSignatureRequest(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Signer>
     */
    public function getSigners(): Collection
    {
        return $this->signers;
    }

    public function addSigner(Signer $signer): self
    {
        if (!$this->signers->contains($signer)) {
            $this->signers[] = $signer;
            $signer->setSignatureRequest($this);
        }
        return $this;
    }

    public function removeSigner(Signer $signer): self
    {
        if ($this->signers->removeElement($signer)) {
            if ($signer->getSignatureRequest() === $this) {
                $signer->setSignatureRequest(null);
            }
        }
        return $this;
    }
}