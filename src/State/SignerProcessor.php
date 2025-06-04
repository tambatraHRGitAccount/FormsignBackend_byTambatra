<?php

namespace App\State;

use App\ApiResource\SignerResource;
use App\Dto\SignerDto;
use App\Entity\Signer;
use App\Entity\SignatureRequest;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SignerProcessor implements ProcessorInterface
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
        $this->logger->info('Processing SignerDto', ['data' => (array)$data]);

        if (!$data instanceof SignerDto) {
            $this->logger->error('Data is not an instance of SignerDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($data->signatureRequestId);
        if (!$signatureRequest) {
            $this->logger->error('SignatureRequest not found', ['id' => $data->signatureRequestId]);
            throw new NotFoundHttpException('SignatureRequest not found for ID: ' . $data->signatureRequestId);
        }

        $insertAfter = null;
        if ($data->insertAfterId) {
            $insertAfter = $this->entityManager->getRepository(Signer::class)->find($data->insertAfterId);
            if (!$insertAfter) {
                $this->logger->error('InsertAfter Signer not found', ['id' => $data->insertAfterId]);
                throw new NotFoundHttpException('InsertAfter Signer not found for ID: ' . $data->insertAfterId);
            }
        }

        $signer = isset($uriVariables['id'])
            ? $this->entityManager->getRepository(Signer::class)->find($uriVariables['id'])
            : new Signer();

        if (!$signer) {
            $this->logger->error('Signer not found for ID', ['id' => $uriVariables['id'] ?? null]);
            throw new NotFoundHttpException('Signer not found');
        }

        $authenticationDatetime = $data->authenticationDatetime ? new \DateTime($data->authenticationDatetime) : null;
        $signatureDatetime = $data->signatureDatetime ? new \DateTime($data->signatureDatetime) : null;

        $signer->setSignatureRequest($signatureRequest);
        $signer->setInsertAfter($insertAfter);
        $signer->setFirstName($data->firstName);
        $signer->setLastName($data->lastName);
        $signer->setEmail($data->email);
        $signer->setPhoneNumber($data->phoneNumber);
        $signer->setSignatureAuthenticationMode($data->signatureAuthenticationMode);
        $signer->setHasSigned($data->hasSigned);
        $signer->setIpAddress($data->ipAddress);
        $signer->setAuthenticationDatetime($authenticationDatetime);
        $signer->setSignatureDatetime($signatureDatetime);

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($signer);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('Signer persisted successfully', ['id' => $signer->getId()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to persist Signer', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to persist Signer: ' . $e->getMessage());
        }

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