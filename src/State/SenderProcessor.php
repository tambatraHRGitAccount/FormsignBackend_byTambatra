<?php

namespace App\State;

use App\ApiResource\SenderResource;
use App\Dto\SenderDto;
use App\Entity\Sender;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SenderProcessor implements ProcessorInterface
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
        $this->logger->info('Processing SenderDto', ['data' => (array)$data]);

        if (!$data instanceof SenderDto) {
            $this->logger->error('Data is not an instance of SenderDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $sender = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(Sender::class)->find($uriVariables['id'])
            : new Sender();

        if (!$sender) {
            $this->logger->error('Sender not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('Sender not found');
        }

        $sender->setEmail($data->email);
        $sender->setUpdatedAt(new \DateTime());

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($sender);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('Sender persisted successfully', ['id' => $sender->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist Sender', ['exception' => $e->getMessage()]);
            throw new BadRequestHttpException('Failed to persist: ' . $e->getMessage());
        }

        $resource = new SenderResource();
        $resource->id = $sender->getId();
        $resource->email = $sender->getEmail();
        $resource->status = $sender->getStatus();
        $resource->createdAt = $sender->getCreatedAt();
        $resource->updatedAt = $sender->getUpdatedAt();
        return $resource;
    }
}