<?php

namespace App\State;

use App\ApiResource\InitialSettingResource;
use App\Dto\InitialSettingDto;
use App\Entity\InitialSetting;
use App\Entity\Document;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InitialSettingProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;
    private LoggerInterface $logger;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        $this->logger->info('Processing InitialSettingDto', ['data' => (array)$data]);

        if (!$data instanceof InitialSettingDto) {
            $this->logger->error('Data is not an instance of InitialSettingDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $document = $this->entityManager->getRepository(Document::class)->find($data->documentId);
        if (!$document) {
            $this->logger->error('Document not found', ['id' => $data->documentId]);
            throw new NotFoundHttpException('Document not found for ID: ' . $data->documentId);
        }

        $initialSetting = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(InitialSetting::class)->find($uriVariables['id'])
            : new InitialSetting();

        if (!$initialSetting) {
            $this->logger->error('InitialSetting not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('InitialSetting not found');
        }

        $initialSetting->setDocument($document);
        $initialSetting->setAlignment($data->alignment);
        $initialSetting->setY($data->y);

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($initialSetting);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('InitialSetting persisted successfully', ['id' => $initialSetting->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist InitialSetting', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist InitialSetting: ' . $e->getMessage());
        }

        $resource = new InitialSettingResource();
        $resource->id = $initialSetting->getId();
        $resource->documentId = $initialSetting->getDocument()->getId();
        $resource->alignment = $initialSetting->getAlignment();
        $resource->y = $initialSetting->getY();
        return $resource;
    }
}