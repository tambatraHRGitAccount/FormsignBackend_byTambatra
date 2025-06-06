<?php

namespace App\State;

use App\ApiResource\SignerResource;
use App\Entity\Signer;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SignerState implements ProviderInterface
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
        if ($operation instanceof CollectionOperationInterface) {
            $this->logger->info('Fetching all signers');
            $signers = $this->entityManager->getRepository(Signer::class)->findAll();
            return array_map([$this, 'mapToResource'], $signers);
        }

        $id = $uriVariables['id'] ?? null;
        if (!$id) {
            $this->logger->error('No ID provided for Signer');
            throw new NotFoundHttpException('Signer ID is required');
        }

        $signer = $this->entityManager->getRepository(Signer::class)->find($id);
        if (!$signer) {
            $this->logger->error('Signer not found for ID', ['id' => $id]);
            throw new NotFoundHttpException('Signer not found');
        }

        $this->logger->info('Fetched Signer', ['id' => $id]);
        return $this->mapToResource($signer);
    }

    private function mapToResource(Signer $signer): SignerResource
    {
        $resource = new SignerResource();
        $resource->id = $signer->getId();
        $resource->signatureRequestId = $signer->getSignatureRequest()->getId();
        $resource->firstName = $signer->getFirstName();
        $resource->lastName = $signer->getLastName();
        $resource->email = $signer->getEmail();
        $resource->phoneNumber = $signer->getPhoneNumber();
        $resource->signatureAuthenticationMode = $signer->getSignatureAuthenticationMode();
        $resource->insertAfterId = $signer->getInsertAfterId();
        $resource->smsMessage = $signer->getSmsMessage();
        $resource->hasSigned = $signer->hasSigned();
        $resource->ipAddress = $signer->getIpAddress();
        $resource->authenticationDatetime = $signer->getAuthenticationDatetime();
        $resource->signatureDatetime = $signer->getSignatureDatetime();
        $resource->status = $signer->getStatus();
        $resource->createdAt = $signer->getCreatedAt();
        $resource->updatedAt = $signer->getUpdatedAt();
        return $resource;
    }
}