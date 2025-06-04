<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class ReminderSettingDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $signatureRequestId;

    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    #[Assert\GreaterThanOrEqual(1)]
    #[Groups(['write'])]
    public int $intervalInDays;

    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    #[Assert\GreaterThanOrEqual(1)]
    #[Groups(['write'])]
    public int $maxOccurrences;
}