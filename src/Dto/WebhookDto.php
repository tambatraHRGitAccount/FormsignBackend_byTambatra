<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class WebhookDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $signatureRequestId;

    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['write'])]
    public string $event;

    #[Assert\NotBlank]
    #[Assert\Url]
    #[Groups(['write'])]
    public string $url;

    #[Assert\NotBlank]
    #[Assert\Choice(['POST', 'GET', 'PUT', 'DELETE'])]
    #[Groups(['write'])]
    public string $method;
}