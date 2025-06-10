<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\SignerController;

#[ORM\Entity]
#[ORM\Table(name: 'signer')]
#[ApiResource(
    operations: [
        new Post(
            uriTemplate: '/signature_request/{signatureRequestId}/signer',
            controller: SignerController::class.'::addSigner',
            inputFormats: ['json' => ['application/json']],
            deserialize: false,
            normalizationContext: ['groups' => ['signer:read']],
            denormalizationContext: ['groups' => ['signer:write']],
            description: 'Adds a signer to a specific signature request',
            processor: \App\State\SignerProcessor::class,
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
    normalizationContext: ['groups' => ['signer:read']],
    denormalizationContext: ['groups' => ['signer:write']]
)]
class Signer
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    #[Groups(['signer:read'])]
    private string $id;

    #[ORM\Column(length: 255)]
    #[Groups(['signer:read', 'signer:write'])]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Groups(['signer:read', 'signer:write'])]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    #[Groups(['signer:read', 'signer:write'])]
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    #[Groups(['signer:read', 'signer:write'])]
    #[Assert\NotBlank]
    #[Assert\Regex("/^\+?[1-9]\d{1,18}$/")]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 50)]
    #[Groups(['signer:read', 'signer:write'])]
    #[Assert\NotBlank]
    #[Assert\Choice(['email', 'sms', 'otp'])]
    private ?string $signatureAuthenticationMode = null;

    #[ORM\Column]
    #[Groups(['signer:read', 'signer:write'])]
    #[Assert\NotNull]
    #[Assert\GreaterThanOrEqual(0)]
    private ?int $insertAfterId = null;

    #[ORM\Column(type: 'json', nullable: true)]
    #[Groups(['signer:read', 'signer:write'])]
    private ?array $smsNotification = null;

    #[ORM\ManyToOne(targetEntity: SignatureRequest::class, inversedBy: 'signers')]
    #[ORM\JoinColumn(name: 'signature_request_id', referencedColumnName: 'id', nullable: false)]
    #[Groups(['signer:read'])]
    #[Assert\NotNull]
    private ?SignatureRequest $signatureRequest = null;

    public function __construct()
    {
        $this->id = Uuid::v1()->toRfc4122();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getSignatureAuthenticationMode(): ?string
    {
        return $this->signatureAuthenticationMode;
    }

    public function setSignatureAuthenticationMode(string $signatureAuthenticationMode): self
    {
        $this->signatureAuthenticationMode = $signatureAuthenticationMode;
        return $this;
    }

    public function getInsertAfterId(): ?int
    {
        return $this->insertAfterId;
    }

    public function setInsertAfterId(int $insertAfterId): self
    {
        $this->insertAfterId = $insertAfterId;
        return $this;
    }

    public function getSmsNotification(): ?array
    {
        return $this->smsNotification;
    }

    public function setSmsNotification(?array $smsNotification): self
    {
        $this->smsNotification = $smsNotification;
        return $this;
    }

    public function getSignatureRequest(): ?SignatureRequest
    {
        return $this->signatureRequest;
    }

    public function setSignatureRequest(?SignatureRequest $signatureRequest): self
    {
        $this->signatureRequest = $signatureRequest;
        return $this;
    }
}