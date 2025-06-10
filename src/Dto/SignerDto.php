<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class SignerDTO
{
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    public string $firstName;

    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    public string $lastName;

    #[Assert\NotBlank]
    #[Assert\Email]
    public string $email;

    #[Assert\NotBlank]
    #[Assert\Length(max: 20)]
    // #[Assert\Regex(pattern: '/^\+?[1-9]\d{1,14}$/', message: 'Invalid phone number format')]
    public string $phoneNumber;

    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['email', 'sms'])]
    public string $signatureAuthenticationMode;

    #[Assert\NotBlank]
    #[Assert\Positive]
    public int $insertAfterId;

    #[Assert\When(
        expression: 'this.smsNotification !== null',
        constraints: [
            new Assert\Collection(
                fields: [
                    'message' => [
                        new Assert\NotBlank,
                        new Assert\Length(max: 160, maxMessage: 'SMS message cannot exceed 160 characters')
                    ]
                ]
            )
        ]
    )]
    public ?array $smsNotification;

    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $phoneNumber,
        string $signatureAuthenticationMode,
        int $insertAfterId,
        ?array $smsNotification
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->signatureAuthenticationMode = $signatureAuthenticationMode;
        $this->insertAfterId = $insertAfterId;
        $this->smsNotification = $smsNotification;
    }
}