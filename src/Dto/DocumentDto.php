<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

class DocumentDto
{
    #[Assert\NotBlank]
    #[Groups(['write'])]
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Regex(
        pattern: '/^(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?$/',
        message: 'The content must be a valid Base64 encoded string'
    )]
    #[Groups(['write'])]
    public string $content;

    #[Groups(['write'])]
    public bool $isSignable = true;

    #[Groups(['write'])]
    public ?string $signedHash = null;

    #[Groups(['write'])]
    #[Assert\Type('array')]
    #[Assert\Collection(
        fields: [
            'page' => [new Assert\Type('int'), new Assert\GreaterThanOrEqual(1)],
            'x' => [new Assert\Type('int'), new Assert\GreaterThanOrEqual(0)],
            'y' => [new Assert\Type('int'), new Assert\GreaterThanOrEqual(0)],
            'height' => [new Assert\Type('int'), new Assert\GreaterThan(0)],
            'width' => [new Assert\Type('int'), new Assert\GreaterThan(0)]
        ],
        allowMissingFields: true
    )]
    public ?array $signatureSettings = null;

    #[Groups(['write'])]
    public ?array $initialSettings = null;

    #[Groups(['write'])]
    public ?string $insertAfterId = null;
}