<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class SignatureRequestDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $name;

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public array $email;

    #[Groups(['write'])]
    public ?\DateTimeInterface $expirationDate = null;

    #[Groups(['write'])]
    public string $timezone = 'Europe/Paris';

    #[Groups(['write'])]
    public bool $signersAllowedToDecline = false;

    #[Groups(['write'])]
    public array $reminderSettings = ['interval_in_days' => 1, 'max_occurrences' => 5];

    #[Groups(['write'])]
    public array $webhooks = [];

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $senderId;

    #[Groups(['write'])]
    public ?string $folderId = null;
}