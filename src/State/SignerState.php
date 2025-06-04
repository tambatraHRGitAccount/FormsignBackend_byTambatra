<?php

namespace App\State;

use App\ApiResource\SignerResource;
use App\Entity\Signer;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

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
        if (isset($uriVariables['id'])) {
            $signer = $this->entityManager->getRepository(Signer::class)->find($uriVariables['id']);
            $this->logger->info('Fetched Signer by ID', ['id' => $uriVariables['id'], 'result' => $signer]);
            return $signer ? $this->mapToResource($signer) : null;
        }

        $signers = $this->entityManager->getRepository(Signer::class)->findAll();
        $this->logger->info('Fetched all Signers', ['count' => count($signers)]);
        return array_map([$this, 'mapToResource'], $signers);
    }

    private function mapToResource(Signer $signer): SignerResource
    {
        $resource = new SignerResource();
        $resource->id = $signer->getId();
        $resource->signatureRequestId = $signer->getSignatureRequest()->getId();
        $resource->insertAfterId = $signer->getInsertAfter() ? $signer->getInsertAfter()->getId() : null;
        $resource->firstName = $signer->getFirstName();
        $resource->lastName = $signer->getLastName();
        $resource->email = $signer->getEmail();
        $resource->phoneNumber = $signer->getPhoneNumber();
        $resource->signatureAuthenticationMode = $signer->getSignatureAuthenticationMode();
        $resource->hasSigned = $signer->hasSigned();
        $resource->ipAddress = $signer->getIpAddress();
        $resource->authenticationDatetime = $signer->getAuthenticationDatetime();
        $resource->signatureDatetime = $signer->getSignatureDatetime();
        $resource->createdAt = $signer->getCreatedAt();
        return $resource;
    }
}