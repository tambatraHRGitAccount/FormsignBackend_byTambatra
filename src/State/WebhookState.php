<?php

namespace App\State;

use App\ApiResource\WebhookResource;
use App\Entity\Webhook;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class WebhookState implements ProviderInterface
{
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if (isset($uriVariables['id'])) {
            $webhook = $this->entityManager->getRepository(Webhook::class)->find($uriVariables['id']);
            $this->logger->info('Fetched Webhook by ID', ['id' => $uriVariables['id'], 'result' => $webhook]);
            return $webhook ? $this->mapToResource($webhook) : null;
        }

        $webhooks = $this->entityManager->getRepository(Webhook::class)->findAll();
        $this->logger->info('Fetched all Webhooks', ['count' => count($webhooks)]);
        return array_map([$this, 'mapToResource'], $webhooks);
    }

    private function mapToResource(Webhook $webhook): WebhookResource
    {
        $resource = new WebhookResource();
        $resource->id = $webhook->getId();
        $resource->signatureRequestId = $webhook->getSignatureRequest()->getId();
        $resource->event = $webhook->getEvent();
        $resource->url = $webhook->getUrl();
        $resource->method = $webhook->getMethod();
        return $resource;
    }
}