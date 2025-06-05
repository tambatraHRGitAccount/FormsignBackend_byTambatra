<?php

namespace App\State;

use App\ApiResource\FolderResource;
use App\Dto\FolderDto;
use App\Entity\Folder;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FolderProcessor implements ProcessorInterface
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
        $this->logger->info('Processing FolderDto', ['data' => (array)$data]);

        if (!$data instanceof FolderDto) {
            $this->logger->error('Data is not an instance of FolderDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $folder = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(Folder::class)->find($uriVariables['id'])
            : new Folder();

        if (!$folder) {
            $this->logger->error('Folder not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('Folder not found');
        }

        $folder->setName($data->name);
        $folder->setMimeType($data->mimeType);
        $folder->setFile($data->file);
        $folder->setUpdatedAt(new \DateTime());

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($folder);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('Folder persisted successfully', ['id' => $folder->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist Folder', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist Folder: ' . $e->getMessage());
        }

        $resource = new FolderResource();
        $resource->id = $folder->getId();
        $resource->name = $folder->getName();
        $resource->mimeType = $folder->getMimeType();
        $resource->file = $folder->getFile();
        $resource->createdAt = $folder->getCreatedAt();
        $resource->updatedAt = $folder->getUpdatedAt();
        return $resource;
    }
}