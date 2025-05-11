<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\AuthorisationDto;
use App\Entity\Authorisation;
use App\Entity\Clients;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AuthorisationProcessor implements ProcessorInterface
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
            $authorisation = $this->entityManager->getRepository(Authorisation::class)->find($uriVariables['id_auth']);
            if ($authorisation) {
                $this->entityManager->remove($authorisation);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof AuthorisationDto) {
            // Valider que CRMClientRef existe dans la table clients
            if ($data->crmClientRef) {
                $client = $this->entityManager->getRepository(Clients::class)->findOneBy(['crmClientRef' => $data->crmClientRef]);
                if (!$client) {
                    throw new BadRequestHttpException('Invalid CRMClientRef: Client does not exist');
                }
            } else {
                throw new BadRequestHttpException('CRMClientRef is required');
            }

            if (!empty($uriVariables)) {
                // PUT: Update existing authorisation
                $authorisation = $this->entityManager->getRepository(Authorisation::class)->find($uriVariables['id_auth']);
                if (!$authorisation) {
                    throw new BadRequestHttpException('Authorisation not found');
                }
            } else {
                // POST: Create new authorisation
                $authorisation = new Authorisation();
            }

            // Map DTO to Entity
            $authorisation->setCrmClientRef($data->crmClientRef);
            $authorisation->setTitleAuthPerson($data->titleAuthPerson);
            $authorisation->setSurnameAuthPerson($data->surnameAuthPerson);
            $authorisation->setForenameAuthPerson($data->forenameAuthPerson);
            $authorisation->setJobTitleAuthPerson($data->jobTitleAuthPerson);
            $authorisation->setPhone1AuthPerson($data->phone1AuthPerson);
            $authorisation->setPhone2AuthPerson($data->phone2AuthPerson);
            $authorisation->setPhone3AuthPerson($data->phone3AuthPerson);
            $authorisation->setPhone4AuthPerson($data->phone4AuthPerson);
            $authorisation->setEmailAddress1AuthPerson($data->emailAddress1AuthPerson);

            // Persist the entity
            try {
                $this->entityManager->persist($authorisation);
                $this->entityManager->flush();
            } catch (\Exception $e) {
                throw new BadRequestHttpException('Failed to save authorisation: ' . $e->getMessage());
            }

            // Map Entity back to DTO for response
            $dto = new AuthorisationDto();
            $dto->idAuth = $authorisation->getIdAuth();
            $dto->crmClientRef = $authorisation->getCrmClientRef();
            $dto->titleAuthPerson = $authorisation->getTitleAuthPerson();
            $dto->surnameAuthPerson = $authorisation->getSurnameAuthPerson();
            $dto->forenameAuthPerson = $authorisation->getForenameAuthPerson();
            $dto->jobTitleAuthPerson = $authorisation->getJobTitleAuthPerson();
            $dto->phone1AuthPerson = $authorisation->getPhone1AuthPerson();
            $dto->phone2AuthPerson = $authorisation->getPhone2AuthPerson();
            $dto->phone3AuthPerson = $authorisation->getPhone3AuthPerson();
            $dto->phone4AuthPerson = $authorisation->getPhone4AuthPerson();
            $dto->emailAddress1AuthPerson = $authorisation->getEmailAddress1AuthPerson();

            return $dto;
        }

        throw new BadRequestHttpException('Invalid data type');
    }
}