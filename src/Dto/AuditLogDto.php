<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class AuditLogDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $signatureRequestId;

    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['write'])]
    public string $eventType;

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public array $eventData;
}