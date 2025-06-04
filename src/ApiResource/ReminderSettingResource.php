<?php

namespace App\ApiResource;

use App\Dto\ReminderSettingDto;
use App\State\ReminderSettingState;
use App\State\ReminderSettingProcessor;
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
            provider: ReminderSettingState::class
        ),
        new GetCollection(
            provider: ReminderSettingState::class
        ),
        new Post(
            input: ReminderSettingDto::class,
            processor: ReminderSettingProcessor::class
        ),
        new Patch(
            input: ReminderSettingDto::class,
            processor: ReminderSettingProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class ReminderSettingResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read'])]
    public string $signatureRequestId;

    #[Groups(['read', 'write'])]
    public int $intervalInDays;

    #[Groups(['read', 'write'])]
    public int $maxOccurrences;
}