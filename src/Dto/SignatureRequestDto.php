<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class SignatureRequestDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $senderId;

    #[Groups(['write'])]
    public ?string $folderId;

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $emailMessage;

    #[Assert\NotBlank]
    #[Assert\Date]
    #[Groups(['write'])]
    public string $expirationDate;

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $name;

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $timezone;

    #[Assert\Type('boolean')]
    #[Groups(['write'])]
    public bool $signersAllowedToDecline;

    #[Assert\NotBlank]
    #[Assert\Choice(['pending', 'completed', 'declined', 'expired'])]
    #[Groups(['write'])]
    public string $status;
}