<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class UserAccountDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $folderId;

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $apiToken;
}