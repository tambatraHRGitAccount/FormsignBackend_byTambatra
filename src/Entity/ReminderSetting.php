<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\Table(name: 'remindersettings')]
class ReminderSetting
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: SignatureRequest::class)]
    #[ORM\JoinColumn(name: 'signature_request_id', referencedColumnName: 'id', nullable: false)]
    private SignatureRequest $signatureRequest;

    #[ORM\Column(type: 'integer')]
    private int $intervalInDays;

    #[ORM\Column(type: 'integer')]
    private int $maxOccurrences;

    public function __construct()
    {
        $this->id = Uuid::v1()->toRfc4122();
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

    public function getIntervalInDays(): int
    {
        return $this->intervalInDays;
    }

    public function setIntervalInDays(int $intervalInDays): self
    {
        $this->intervalInDays = $intervalInDays;
        return $this;
    }

    public function getMaxOccurrences(): int
    {
        return $this->maxOccurrences;
    }

    public function setMaxOccurrences(int $maxOccurrences): self
    {
        $this->maxOccurrences = $maxOccurrences;
        return $this;
    }
}