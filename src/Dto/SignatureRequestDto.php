<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class SignatureRequestDTO
{
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    public string $name;

    #[Assert\NotBlank]
    #[Assert\Collection(
        fields: [
            'sender' => [new Assert\NotBlank, new Assert\Uuid],
            'message' => [new Assert\NotBlank, new Assert\Length(max: 1000)]
        ]
    )]
    public array $email;

    #[Assert\Date]
    #[Assert\Regex(
        pattern: '/^\d{4}-\d{2}-\d{2}$/',
        message: 'The expiration_date must be in YYYY-MM-DD format'
    )]
    public ?string $expirationDate;

    #[Assert\When(
        expression: 'this.reminderSettings !== null',
        constraints: [
            new Assert\Collection(
                fields: [
                    'interval_in_days' => [new Assert\Positive],
                    'max_occurrences' => [new Assert\Positive]
                ]
            )
        ]
    )]
    public ?array $reminderSettings;

    #[Assert\Timezone]
    public ?string $timezone;

    #[Assert\Type('bool')]
    public bool $signersAllowedToDecline;

    #[Assert\All([
        new Assert\Collection(
            fields: [
                'event' => [new Assert\NotBlank, new Assert\Choice(choices: ['signature_request.approved', 'signature_request.declined', 'signature_request.signed'])],
                'url' => [new Assert\NotBlank, new Assert\Url],
                'method' => [new Assert\NotBlank, new Assert\Choice(choices: ['post', 'get'])]
            ]
        )
    ])]
    public ?array $webhooks;

    public function __construct(
        string $name,
        array $email,
        ?string $expirationDate,
        ?array $reminderSettings,
        ?string $timezone,
        bool $signersAllowedToDecline,
        ?array $webhooks
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->expirationDate = $expirationDate;
        $this->reminderSettings = $reminderSettings;
        $this->timezone = $timezone ?? 'Europe/Paris';
        $this->signersAllowedToDecline = $signersAllowedToDecline;
        $this->webhooks = $webhooks;
    }
}