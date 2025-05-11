<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\FamilyDto;
use App\Entity\Family;
use App\Entity\Client; // Ajout pour valider CRMClientRef
use App\Entity\Clients;
use App\Enum\FamilyType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class FamilyProcessor implements ProcessorInterface
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
            $family = $this->entityManager->getRepository(Family::class)->find($uriVariables['id']);
            if ($family) {
                $this->entityManager->remove($family);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof FamilyDto) {
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
                // PUT: Update existing family member
                $family = $this->entityManager->getRepository(Family::class)->find($uriVariables['id']);
                if (!$family) {
                    throw new BadRequestHttpException('Family member not found');
                }
            } else {
                // POST: Create new family member
                $family = new Family();
            }

            // Map DTO to Entity
            $family->setCrmClientRef($data->crmClientRef);
            $family->setType($data->type ? FamilyType::from($data->type) : null);
            $family->setSurname($data->surname);
            $family->setForename($data->forename);
            $family->setDateOfBirth($data->dateOfBirth ? new \DateTime($data->dateOfBirth) : null);
            $family->setAge($data->age);

            // Persist the entity
            try {
                $this->entityManager->persist($family);
                $this->entityManager->flush();
            } catch (\Exception $e) {
                throw new BadRequestHttpException('Failed to save family member: ' . $e->getMessage());
            }

            // Map Entity back to DTO for response
            $dto = new FamilyDto();
            $dto->crmClientRef = $family->getCrmClientRef();
            $dto->type = $family->getType() ? $family->getType()->value : null;
            $dto->surname = $family->getSurname();
            $dto->forename = $family->getForename();
            $dto->dateOfBirth = $family->getDateOfBirth() ? $family->getDateOfBirth()->format('Y-m-d') : null;
            $dto->age = $family->getAge();

            return $dto;
        }

        throw new BadRequestHttpException('Invalid data type');
    }
}