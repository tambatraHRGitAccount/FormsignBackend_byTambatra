<?php

namespace App\State;

use App\ApiResource\WebhookResource;
use App\Dto\WebhookDto;
use App\Entity\Webhook;
use App\Entity\SignatureRequest;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WebhookProcessor implements ProcessorInterface
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
        $this->logger->info('Processing WebhookDto', ['data' => (array)$data]);

        if (!$data instanceof WebhookDto) {
            $this->logger->error('Data is not an instance of WebhookDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($data->signatureRequestId);
        if (!$signatureRequest) {
            $this->logger->error('SignatureRequest not found', ['id' => $data->signatureRequestId]);
            throw new NotFoundHttpException('SignatureRequest not found for ID: ' . $data->signatureRequestId);
        }

        $webhook = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(Webhook::class)->find($uriVariables['id'])
            : new Webhook();

        if (!$webhook) {
            $this->logger->error('Webhook not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('Webhook not found');
        }

        $webhook->setSignatureRequest($signatureRequest);
        $webhook->setEvent($data->event);
        $webhook->setUrl($data->url);
        $webhook->setMethod($data->method);

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($webhook);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('Webhook persisted successfully', ['id' => $webhook->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist Webhook', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist Webhook: ' . $e->getMessage());
        }

        $resource = new WebhookResource();
        $resource->id = $webhook->getId();
        $resource->signatureRequestId = $webhook->getSignatureRequest()->getId();
        $resource->event = $webhook->getEvent();
        $resource->url = $webhook->getUrl();
        $resource->method = $webhook->getMethod();
        return $resource;
    }
}