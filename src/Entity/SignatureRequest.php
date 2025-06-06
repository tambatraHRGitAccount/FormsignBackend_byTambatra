<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'signaturerequests')]
class SignatureRequest
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: Sender::class)]
    #[ORM\JoinColumn(name: 'sender_id', referencedColumnName: 'id', nullable: false)]
    private Sender $sender;

    #[ORM\ManyToOne(targetEntity: Folder::class)]
    #[ORM\JoinColumn(name: 'folder_id', referencedColumnName: 'id', nullable: true)]
    private ?Folder $folder = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $emailMessage = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $expirationDate = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $timezone = 'Europe/Paris';

    #[ORM\Column(type: 'boolean')]
    private bool $signersAllowedToDecline = false;

    #[ORM\Column(type: 'string', length: 50)]
    private string $status = 'draft';

    #[ORM\Column(type: 'json')]
    private array $reminderSettings = ['interval_in_days' => 1, 'max_occurrences' => 5];

    #[ORM\Column(type: 'json')]
    private array $webhooks = [];

    #[ORM\Column(type: 'json')]
    private array $auditEvents = [];

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'signatureRequest', targetEntity: Document::class, cascade: ['persist', 'remove'])]
    private Collection $documents;

    #[ORM\OneToMany(mappedBy: 'signatureRequest', targetEntity: Signer::class, cascade: ['persist', 'remove'])]
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