<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class InitialSettingDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $documentId;

    #[Assert\NotBlank]
    #[Assert\Choice(['left', 'center', 'right'])]
    #[Groups(['write'])]
    public string $alignment;

    #[Assert\NotBlank]
    #[Assert\Type('integer')]
    #[Groups(['write'])]
    public int $y;
}