<?php

namespace App\State;

use App\ApiResource\SMSNotificationResource;
use App\Entity\SMSNotification;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class SMSNotificationState implements ProviderInterface
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
            $smsNotification = $this->entityManager->getRepository(SMSNotification::class)->find($uriVariables['id']);
            $this->logger->info('Fetched SMSNotification by ID', ['id' => $uriVariables['id'], 'result' => $smsNotification]);
            return $smsNotification ? $this->mapToResource($smsNotification) : null;
        }

        $smsNotifications = $this->entityManager->getRepository(SMSNotification::class)->findAll();
        $this->logger->info('Fetched all SMSNotifications', ['count' => count($smsNotifications)]);
        return array_map([$this, 'mapToResource'], $smsNotifications);
    }

    private function mapToResource(SMSNotification $smsNotification): SMSNotificationResource
    {
        $resource = new SMSNotificationResource();
        $resource->id = $smsNotification->getId();
        $resource->signerId = $smsNotification->getSigner()->getId();
        $resource->message = $smsNotification->getMessage();
        return $resource;
    }
}