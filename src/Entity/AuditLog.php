<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\Table(name: 'auditlogs')]
class AuditLog
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: SignatureRequest::class)]
    #[ORM\JoinColumn(name: 'signature_request_id', referencedColumnName: 'id', nullable: false)]
    private SignatureRequest $signatureRequest;

    #[ORM\Column(type: 'string', length: 100)]
    private string $eventType;

    #[ORM\Column(type: 'json')]
    private array $eventData;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $eventDatetime;

    public function __construct()
    {
        $this->id = Uuid::v1()->toRfc4122();
        $this->eventDatetime = new \DateTime();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSignatureRequest(): SignatureRequest
    {
        return $this->signatureRequest;
    }

    public function setSignatureRequest(SignatureRequest $signatureRequest): self
    {
        $this->signatureRequest = $signatureRequest;
        return $this;
    }

    public function getEventType(): string
    {
        return $this->eventType;
    }

    public function setEventType(string $eventType): self
    {
        $this->eventType = $eventType;
        return $this;
    }

    public function getEventData(): array
    {
        return $this->eventData;
    }

    public function setEventData(array $eventData): self
    {
        $this->eventData = $eventData;
        return $this;
    }

    public function getEventDatetime(): \DateTimeInterface
    {
        return $this->eventDatetime;
    }

    public function setEventDatetime(\DateTimeInterface $eventDatetime): self
    {
        $this->eventDatetime = $eventDatetime;
        return $this;
    }
}