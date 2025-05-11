<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\AppointmentDto;
use App\Entity\Appointment;
use App\Entity\Clients;
use Doctrine\ORM\EntityManagerInterface;

class AppointmentProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($operation instanceof Delete) {
            $appointment = $this->entityManager->getRepository(Appointment::class)->find($uriVariables['id']);
            if ($appointment) {
                $this->entityManager->remove($appointment);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof AppointmentDto) {
            if (!empty($uriVariables)) {
                $appointment = $this->entityManager->getRepository(Appointment::class)->find($uriVariables['id']);
                if (!$appointment) {
                    throw new \RuntimeException('Appointment not found');
                }
            } else {
                $appointment = new Appointment();
            }

            $client = $this->entityManager->getRepository(Clients::class)->find($data->clientId);
            if (!$client) {
                throw new \RuntimeException('Client not found');
            }

            $appointment->setClient($client);
            $appointment->setDateRdv(new \DateTime($data->dateRdv));
            $appointment->setComment($data->comment);
            $appointment->setRequestOrigin($data->requestOrigin);
            $appointment->setOperationType($data->operationType);
            $appointment->setFollowUpStatus($data->followUpStatus);
            $appointment->setUpdatedAt(new \DateTime());

            $this->entityManager->persist($appointment);
            $this->entityManager->flush();

            $dto = new AppointmentDto();
            $dto->id = $appointment->getId();
            $dto->dateRdv = $appointment->getDateRdv()->format('Y-m-d');
            $dto->comment = $appointment->getComment();
            $dto->requestOrigin = $appointment->getRequestOrigin();
            $dto->operationType = $appointment->getOperationType();
            $dto->followUpStatus = $appointment->getFollowUpStatus();
            $dto->clientId = $appointment->getClient()->getId();
            $dto->createdAt = $appointment->getCreatedAt()->format('Y-m-d\TH:i:s');
            $dto->updatedAt = $appointment->getUpdatedAt()->format('Y-m-d\TH:i:s');

            return $dto;
        }

        throw new \RuntimeException('Invalid data type');
    }
}