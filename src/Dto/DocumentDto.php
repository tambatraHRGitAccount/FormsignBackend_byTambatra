<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class DocumentDTO
{
    #[Assert\NotBlank]
    public string $file;

    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Positive]
    public int $insertAfterId;

    #[Assert\When(
        expression: 'this.signatureSettings !== null',
        constraints: [
            new Assert\Collection(
                fields: [
                    'page' => [new Assert\Positive],
                    'x' => [new Assert\PositiveOrZero],
                    'y' => [new Assert\PositiveOrZero],
                    'height' => [new Assert\Positive],
                    'width' => [new Assert\Positive],
                ]
            )
        ]
    )]
    public ?array $signatureSettings;

    #[Assert\When(
        expression: 'this.initial !== null',
        constraints: [
            new Assert\Collection(
                fields: [
                    'alignment' => [new Assert\Choice(choices: ['bottom-right', 'bottom-left', 'top-right', 'top-left'])],
                    'y' => [new Assert\PositiveOrZero],
                ]
            )
        ]
    )]
    public ?array $initial;

    public function __construct(
        string $file,
        string $name,
        int $insertAfterId,
        ?array $signatureSettings,
        ?array $initial
    ) {
        $this->file = $file;
        $this->name = $name;
        $this->insertAfterId = $insertAfterId;
        $this->signatureSettings = $signatureSettings;
        $this->initial = $initial;
    }
}