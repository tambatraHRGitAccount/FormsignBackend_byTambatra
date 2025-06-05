<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class FolderDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $name;
}