<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class SMSNotificationDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $signerId;

    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $message;
}