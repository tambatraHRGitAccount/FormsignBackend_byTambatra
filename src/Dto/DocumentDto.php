<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class DocumentDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $signatureRequestId;

    #[Groups(['write'])]
    public ?string $insertAfterId;

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $file;

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $name;

    #[Assert\Type('boolean')]
    #[Groups(['write'])]
    public bool $isSignable;

    #[Assert\NotBlank]
    #[Assert\Length(max: 64)]
    #[Groups(['write'])]
    public string $initialHash;

    #[Assert\NotBlank]
    #[Assert\Length(max: 64)]
    #[Groups(['write'])]
    public string $signedHash;

    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['write'])]
    public string $mimeType;
}