<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class UserAccountDto
{
    #[Assert\NotBlank]
    #[Assert\Email]
    #[Groups(['write'])]
    public string $email;
}