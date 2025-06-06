<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class SignerDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $firstName;

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $lastName;

    #[Assert\NotBlank]
    #[Assert\Email]
    #[Groups(['write'])]
    public string $email;

    #[Groups(['write'])]
    public ?string $phoneNumber = null;

    #[Groups(['write'])]
    public string $signatureAuthenticationMode = 'email';

    #[Groups(['write'])]
    public ?string $insertAfterId = null;

    #[Groups(['write'])]
    public ?string $smsMessage = null;

    #[Groups(['write'])]
    public bool $hasSigned = false;

    #[Groups(['write'])]
    public ?string $ipAddress = null;

    #[Groups(['write'])]
    public ?string $status = 'pending';

    #[Groups(['write'])]
    public ?\DateTimeInterface $authenticationDatetime = null;

    #[Groups(['write'])]
    public ?\DateTimeInterface $signatureDatetime = null;
}