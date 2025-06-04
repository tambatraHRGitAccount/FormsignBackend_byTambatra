<?php

namespace App\State;

use App\ApiResource\ReminderSettingResource;
use App\Entity\ReminderSetting;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class ReminderSettingState implements ProviderInterface
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
            $reminderSetting = $this->entityManager->getRepository(ReminderSetting::class)->find($uriVariables['id']);
            $this->logger->info('Fetched ReminderSetting by ID', ['id' => $uriVariables['id'], 'result' => $reminderSetting]);
            return $reminderSetting ? $this->mapToResource($reminderSetting) : null;
        }

        $reminderSettings = $this->entityManager->getRepository(ReminderSetting::class)->findAll();
        $this->logger->info('Fetched all ReminderSettings', ['count' => count($reminderSettings)]);
        return array_map([$this, 'mapToResource'], $reminderSettings);
    }

    private function mapToResource(ReminderSetting $reminderSetting): ReminderSettingResource
    {
        $resource = new ReminderSettingResource();
        $resource->id = $reminderSetting->getId();
        $resource->signatureRequestId = $reminderSetting->getSignatureRequest()->getId();
        $resource->intervalInDays = $reminderSetting->getIntervalInDays();
        $resource->maxOccurrences = $reminderSetting->getMaxOccurrences();
        return $resource;
    }
}