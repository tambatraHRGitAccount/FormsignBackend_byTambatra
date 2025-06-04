<?php

namespace App\State;

use App\ApiResource\SMSNotificationResource;
use App\Dto\SMSNotificationDto;
use App\Entity\SMSNotification;
use App\Entity\Signer;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SMSNotificationProcessor implements ProcessorInterface
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
        $this->logger->info('Processing SMSNotificationDto', ['data' => (array)$data]);

        if (!$data instanceof SMSNotificationDto) {
            $this->logger->error('Data is not an instance of SMSNotificationDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $signer = $this->entityManager->getRepository(Signer::class)->find($data->signerId);
        if (!$signer) {
            $this->logger->error('Signer not found', ['id' => $data->signerId]);
            throw new NotFoundHttpException('Signer not found for ID: ' . $data->signerId);
        }

        $smsNotification = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(SMSNotification::class)->find($uriVariables['id'])
            : new SMSNotification();

        if (!$smsNotification) {
            $this->logger->error('SMSNotification not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('SMSNotification not found');
        }

        $smsNotification->setSigner($signer);
        $smsNotification->setMessage($data->message);

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($smsNotification);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('SMSNotification persisted successfully', ['id' => $smsNotification->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist SMSNotification', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist SMSNotification: ' . $e->getMessage());
        }

        $resource = new SMSNotificationResource();
        $resource->id = $smsNotification->getId();
        $resource->signerId = $smsNotification->getSigner()->getId();
        $resource->message = $smsNotification->getMessage();
        return $resource;
    }
}