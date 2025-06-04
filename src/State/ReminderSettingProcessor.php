<?php

namespace App\State;

use App\ApiResource\ReminderSettingResource;
use App\Dto\ReminderSettingDto;
use App\Entity\ReminderSetting;
use App\Entity\SignatureRequest;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReminderSettingProcessor implements ProcessorInterface
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
        $this->logger->info('Processing ReminderSettingDto', ['data' => (array)$data]);

        if (!$data instanceof ReminderSettingDto) {
            $this->logger->error('Data is not an instance of ReminderSettingDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($data->signatureRequestId);
        if (!$signatureRequest) {
            $this->logger->error('SignatureRequest not found', ['id' => $data->signatureRequestId]);
            throw new NotFoundHttpException('SignatureRequest not found for ID: ' . $data->signatureRequestId);
        }

        $reminderSetting = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(ReminderSetting::class)->find($uriVariables['id'])
            : new ReminderSetting();

        if (!$reminderSetting) {
            $this->logger->error('ReminderSetting not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('ReminderSetting not found');
        }

        $reminderSetting->setSignatureRequest($signatureRequest);
        $reminderSetting->setIntervalInDays($data->intervalInDays);
        $reminderSetting->setMaxOccurrences($data->maxOccurrences);

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($reminderSetting);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('ReminderSetting persisted successfully', ['id' => $reminderSetting->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist ReminderSetting', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist ReminderSetting: ' . $e->getMessage());
        }

        $resource = new ReminderSettingResource();
        $resource->id = $reminderSetting->getId();
        $resource->signatureRequestId = $reminderSetting->getSignatureRequest()->getId();
        $resource->intervalInDays = $reminderSetting->getIntervalInDays();
        $resource->maxOccurrences = $reminderSetting->getMaxOccurrences();
        return $resource;
    }
}