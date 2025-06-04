<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

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

    #[ORM\Column(type: 'text')]
    private string $emailMessage;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $expirationDate;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 50)]
    private string $timezone;

    #[ORM\Column(type: 'boolean')]
    private bool $signersAllowedToDecline;

    #[ORM\Column(type: 'string', length: 50)]
    private string $status;

    public function __construct()
    {
        $this->id = Uuid::v1()->toRfc4122();
        $this->createdAt = new \DateTime();
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

    public function getEmailMessage(): string
    {
        return $this->emailMessage;
    }

    public function setEmailMessage(string $emailMessage): self
    {
        $this->emailMessage = $emailMessage;
        return $this;
    }

    public function getExpirationDate(): \DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(\DateTimeInterface $expirationDate): self
    {
        $this->expirationDate = $expirationDate;
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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
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
}