<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class SignatureSettingDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $documentId;

    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    #[Groups(['write'])]
    public int $page;

    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    #[Groups(['write'])]
    public int $x;

    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    #[Groups(['write'])]
    public int $y;

    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    #[Groups(['write'])]
    public int $height;

    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    #[Groups(['write'])]
    public int $width;
}