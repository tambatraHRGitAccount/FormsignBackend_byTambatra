<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class FolderDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $userAccountId;

    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    #[Groups(['write'])]
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['write'])]
    public string $mimeType;

    #[Groups(['write'])]
    public ?string $file;
}