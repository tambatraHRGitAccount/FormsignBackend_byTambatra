<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class SignerDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $signatureRequestId;

    #[Groups(['write'])]
    public ?string $insertAfterId;

    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['write'])]
    public string $firstName;

    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['write'])]
    public string $lastName;

    #[Assert\NotBlank]
    #[Assert\Email]
    #[Groups(['write'])]
    public string $email;

    #[Assert\NotBlank]
    #[Assert\Length(max: 20)]
    #[Groups(['write'])]
    public string $phoneNumber;

    #[Assert\NotBlank]
    #[Assert\Choice(['email', 'sms', 'none'])]
    #[Groups(['write'])]
    public string $signatureAuthenticationMode;

    #[Assert\Type('boolean')]
    #[Groups(['write'])]
    public bool $hasSigned = false;

    #[Assert\NotBlank]
    #[Assert\Ip]
    #[Groups(['write'])]
    public string $ipAddress;

    #[Groups(['write'])]
    public ?string $authenticationDatetime;

    #[Groups(['write'])]
    public ?string $signatureDatetime;
}