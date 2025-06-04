<?php

namespace App\State;

use App\ApiResource\SignatureSettingResource;
use App\Entity\SignatureSetting;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class SignatureSettingState implements ProviderInterface
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
            $signatureSetting = $this->entityManager->getRepository(SignatureSetting::class)->find($uriVariables['id']);
            $this->logger->info('Fetched SignatureSetting by ID', ['id' => $uriVariables['id'], 'result' => $signatureSetting]);
            return $signatureSetting ? $this->mapToResource($signatureSetting) : null;
        }

        $signatureSettings = $this->entityManager->getRepository(SignatureSetting::class)->findAll();
        $this->logger->info('Fetched all SignatureSettings', ['count' => count($signatureSettings)]);
        return array_map([$this, 'mapToResource'], $signatureSettings);
    }

    private function mapToResource(SignatureSetting $signatureSetting): SignatureSettingResource
    {
        $resource = new SignatureSettingResource();
        $resource->id = $signatureSetting->getId();
        $resource->documentId = $signatureSetting->getDocument()->getId();
        $resource->page = $signatureSetting->getPage();
        $resource->x = $signatureSetting->getX();
        $resource->y = $signatureSetting->getY();
        $resource->height = $signatureSetting->getHeight();
        $resource->width = $signatureSetting->getWidth();
        return $resource;
    }
}