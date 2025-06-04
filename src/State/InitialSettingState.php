<?php

namespace App\State;

use App\ApiResource\InitialSettingResource;
use App\Entity\InitialSetting;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class InitialSettingState implements ProviderInterface
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
            $initialSetting = $this->entityManager->getRepository(InitialSetting::class)->find($uriVariables['id']);
            $this->logger->info('Fetched InitialSetting by ID', ['id' => $uriVariables['id'], 'result' => $initialSetting]);
            return $initialSetting ? $this->mapToResource($initialSetting) : null;
        }

        $initialSettings = $this->entityManager->getRepository(InitialSetting::class)->findAll();
        $this->logger->info('Fetched all InitialSettings', ['count' => count($initialSettings)]);
        return array_map([$this, 'mapToResource'], $initialSettings);
    }

    private function mapToResource(InitialSetting $initialSetting): InitialSettingResource
    {
        $resource = new InitialSettingResource();
        $resource->id = $initialSetting->getId();
        $resource->documentId = $initialSetting->getDocument()->getId();
        $resource->alignment = $initialSetting->getAlignment();
        $resource->y = $initialSetting->getY();
        return $resource;
    }
}