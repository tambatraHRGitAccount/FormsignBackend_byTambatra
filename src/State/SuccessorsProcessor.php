<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\SuccessorsDto;
use App\Entity\Successors;
use App\Entity\Clients;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class SuccessorsProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param mixed $data
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return mixed
     */
    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($operation instanceof Delete) {
            $successor = $this->entityManager->getRepository(Successors::class)->find($uriVariables['id']);
            if ($successor) {
                $this->entityManager->remove($successor);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof SuccessorsDto) {
            // Valider que CRMClientRef existe dans la table clients
            if ($data->crmClientRef) {
                $client = $this->entityManager->getRepository(Clients::class)->findOneBy(['crmClientRef' => $data->crmClientRef]);
                if (!$client) {
                    throw new BadRequestHttpException('Invalid CRMClientRef: Client does not exist');
                }
            } else {
                throw new BadRequestHttpException('CRMClientRef is required');
            }

            if (!empty($uriVariables) && isset($uriVariables['id'])) {
                // PUT: Update existing successor
                $successor = $this->entityManager->getRepository(Successors::class)->find($uriVariables['id']);
                if (!$successor) {
                    throw new BadRequestHttpException('Successor not found');
                }
            } else {
                // POST: Create new successor
                $successor = new Successors();
                $successor->setCreatedAt(new \DateTime());
            }

            // Map DTO to Entity
            $successor->setCrmClientRef($data->crmClientRef);
            $successor->setTitle($data->title);
            $successor->setSurname($data->surname);
            $successor->setForename($data->forename);
            $successor->setAddress($data->address);
            $successor->setPhone1($data->phone1);
            $successor->setPhone2($data->phone2);
            $successor->setPhone3($data->phone3);
            $successor->setPhone4($data->phone4);
            $successor->setEmailAddress1($data->emailAddress1);
            $successor->setContactRemarks($data->contactRemarks);
            $successor->setIsAuthorized($data->isAuthorized ?? false);
            $successor->setUpdatedAt(new \DateTime());

            // Persist the entity
            try {
                $this->entityManager->persist($successor);
                $this->entityManager->flush();
            } catch (\Exception $e) {
                throw new BadRequestHttpException('Failed to save successor: ' . $e->getMessage());
            }

            // Map Entity back to DTO for response
            $dto = new SuccessorsDto();
            $dto->id = $successor->getId();
            $dto->crmClientRef = $successor->getCrmClientRef();
            $dto->title = $successor->getTitle();
            $dto->surname = $successor->getSurname();
            $dto->forename = $successor->getForename();
            $dto->address = $successor->getAddress();
            $dto->phone1 = $successor->getPhone1();
            $dto->phone2 = $successor->getPhone2();
            $dto->phone3 = $successor->getPhone3();
            $dto->phone4 = $successor->getPhone4();
            $dto->emailAddress1 = $successor->getEmailAddress1();
            $dto->contactRemarks = $successor->getContactRemarks();
            $dto->isAuthorized = $successor->getIsAuthorized();

            return $dto;
        }

        throw new BadRequestHttpException('Invalid data type');
    }
}