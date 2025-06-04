<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\Table(name: 'smsnotifications')]
class SMSNotification
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: Signer::class)]
    #[ORM\JoinColumn(name: 'signer_id', referencedColumnName: 'id', nullable: false)]
    private Signer $signer;

    #[ORM\Column(type: 'text')]
    private string $message;

    public function __construct()
    {
        $this->id = Uuid::v1()->toRfc4122();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSigner(): Signer
    {
        return $this->signer;
    }

    public function setSigner(Signer $signer): self
    {
        $this->signer = $signer;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }
}