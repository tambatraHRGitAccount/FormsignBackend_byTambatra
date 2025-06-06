<?php

namespace App\State;

use App\ApiResource\SignerResource;
use App\Dto\SignerDto;
use App\Entity\SignatureRequest;
use App\Entity\Signer;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
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
        $this->logger->info('Processing Signer', ['operation' => $operation->getName(), 'signatureRequestId' => $uriVariables['id'] ?? null]);

        if (!$data instanceof SignerDto) {
            $this->logger->error('Data is not an instance of SignerDto', ['data' => $data]);
            throw new BadRequestHttpException('Invalid input data');
        }

        if ($operation instanceof Post) {
            $signatureRequest = $this->entityManager->getRepository(SignatureRequest::class)->find($uriVariables['id']);
            if (!$signatureRequest) {
                $this->logger->error('SignatureRequest not found for ID', ['id' => $uriVariables['id']]);
                throw new NotFoundHttpException('SignatureRequest not found');
            }

            $signer = new Signer();
            $signer->setSignatureRequest($signatureRequest);
        } elseif ($operation instanceof Patch) {
            $signer = $this->entityManager->getRepository(Signer::class)->find($uriVariables['id']);
            if (!$signer) {
                $this->logger->error('Signer not found for ID', ['id' => $uriVariables['id']]);
                throw new NotFoundHttpException('Signer not found');
            }
        } else {
            $this->logger->error('Unsupported operation', ['operation' => $operation->getName()]);
            throw new BadRequestHttpException('Unsupported operation');
        }

        $signer->setFirstName($data->firstName);
        $signer->setLastName($data->lastName);
        $signer->setEmail($data->email);
        $signer->setPhoneNumber($data->phoneNumber);
        $signer->setSignatureAuthenticationMode($data->signatureAuthenticationMode);
        $signer->setInsertAfterId($data->insertAfterId);
        $signer->setSmsMessage($data->smsMessage);
        $signer->setHasSigned($data->hasSigned);
        $signer->setIpAddress($data->ipAddress);
        $signer->setStatus($data->status ?? 'pending');
        $signer->setAuthenticationDatetime($data->authenticationDatetime);
        $signer->setSignatureDatetime($data->signatureDatetime);
        $signer->setUpdatedAt(new \DateTime());

        try {
            $this->entityManager->beginTransaction();
            $this->entityManager->persist($signer);
            $this->entityManager->flush();
            $this->entityManager->commit();
            $this->logger->info('Signer processed successfully', ['id' => $signer->getId(), 'operation' => $operation->getName()]);
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->logger->error('Failed to process Signer', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw new BadRequestHttpException('Failed to process Signer: ' . $e->getMessage());
        }

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