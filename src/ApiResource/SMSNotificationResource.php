<?php

namespace App\ApiResource;

use App\Dto\SMSNotificationDto;
use App\State\SMSNotificationState;
use App\State\SMSNotificationProcessor;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new Get(
            provider: SMSNotificationState::class
        ),
        new GetCollection(
            provider: SMSNotificationState::class
        ),
        new Post(
            input: SMSNotificationDto::class,
            processor: SMSNotificationProcessor::class
        ),
        new Patch(
            input: SMSNotificationDto::class,
            processor: SMSNotificationProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class SMSNotificationResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read'])]
    public string $signerId;

    #[Groups(['read', 'write'])]
    public string $message;
}