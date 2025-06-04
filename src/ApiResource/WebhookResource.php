<?php

namespace App\ApiResource;

use App\Dto\WebhookDto;
use App\State\WebhookState;
use App\State\WebhookProcessor;
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
            provider: WebhookState::class
        ),
        new GetCollection(
            provider: WebhookState::class
        ),
        new Post(
            input: WebhookDto::class,
            processor: WebhookProcessor::class
        ),
        new Patch(
            input: WebhookDto::class,
            processor: WebhookProcessor::class
        ),
        new Delete()
    ],
    normalizationContext: ['groups' => ['read'], 'circular_reference_handler' => 'id'],
    denormalizationContext: ['groups' => ['write']]
)]
class WebhookResource
{
    #[Groups(['read'])]
    public string $id;

    #[Groups(['read'])]
    public string $signatureRequestId;

    #[Groups(['read', 'write'])]
    public string $event;

    #[Groups(['read', 'write'])]
    public string $url;

    #[Groups(['read', 'write'])]
    public string $method;
}