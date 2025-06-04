<?php

namespace App\State;

use App\ApiResource\SignatureSettingResource;
use App\Dto\SignatureSettingDto;
use App\Entity\SignatureSetting;
use App\Entity\Document;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SignatureSettingProcessor implements ProcessorInterface
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
        $this->logger->info('Processing SignatureSettingDto', ['data' => (array)$data]);

        if (!$data instanceof SignatureSettingDto) {
            $this->logger->error('Data is not an instance of SignatureSettingDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $document = $this->entityManager->getRepository(Document::class)->find($data->documentId);
        if (!$document) {
            $this->logger->error('Document not found', ['id' => $data->documentId]);
            throw new NotFoundHttpException('Document not found for ID: ' . $data->documentId);
        }

        $signatureSetting = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(SignatureSetting::class)->find($uriVariables['id'])
            : new SignatureSetting();

        if (!$signatureSetting) {
            $this->logger->error('SignatureSetting not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('SignatureSetting not found');
        }

        $signatureSetting->setDocument($document);
        $signatureSetting->setPage($data->page);
        $signatureSetting->setX($data->x);
        $signatureSetting->setY($data->y);
        $signatureSetting->setHeight($data->height);
        $signatureSetting->setWidth($data->width);

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($signatureSetting);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('SignatureSetting persisted successfully', ['id' => $signatureSetting->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist SignatureSetting', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist SignatureSetting: ' . $e->getMessage());
        }

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