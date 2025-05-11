<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\ClientDto;
use App\Entity\Clients;
use App\Service\ClientService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ClientProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;
    private ClientService $clientService;

    public function __construct(EntityManagerInterface $entityManager, ClientService $clientService)
    {
        $this->entityManager = $entityManager;
        $this->clientService = $clientService;
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
            $client = $this->entityManager->getRepository(Clients::class)->find($uriVariables['id']);
            if ($client) {
                $this->entityManager->remove($client);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof ClientDto) {
            if (!empty($uriVariables)) {
                // PUT: Update existing client
                $client = $this->entityManager->getRepository(Clients::class)->find($uriVariables['id']);
                if (!$client) {
                    throw new BadRequestHttpException('Client not found');
                }
            } else {
                // POST: Create new client
                $client = new Clients();
            }

            // Map DTO to Entity
            // Ne pas définir crmClientRef pour POST, car il est géré par le déclencheur SQL
            if (!empty($uriVariables)) {
                $client->setCrmClientRef($data->crmClientRef);
            }
            $client->setSwanClientRef($data->swanClientRef);
            $client->setTitle($data->title);
            $client->setSurname($data->surname);
            $client->setForename($data->forename);
            $client->setSpouseFullName($data->spouseFullName);
            $client->setDtClientRef($data->dtClientRef);
            $client->setStreet($data->street);
            $client->setStreet2($data->street2);
            $client->setTown($data->town);
            $client->setZipCode($data->zipCode);
            $client->setNationalId($data->nationalId);
            $client->setDateOfBirth($data->dateOfBirth ? new \DateTime($data->dateOfBirth) : null);
            $client->setNationality($data->nationality);
            $client->setPassportNo($data->passportNo);
            $client->setPhone1($data->phone1);
            $client->setPhone2($data->phone2);
            $client->setPhone3($data->phone3);
            $client->setPhone4($data->phone4);
            $client->setEmailAddress1($data->emailAddress1);
            $client->setKycIndicator($data->kycIndicator);
            $client->setEmploymentStatus($data->employmentStatus);
            $client->setJobTitle($data->jobTitle);
            $client->setEmployerName($data->employerName);
            $client->setEmployerAddress($data->employerAddress);
            $client->setBrn($data->brn);
            $client->setSourceOfFunds($data->sourceOfFunds);
            $client->setAverageMonthlyIncome($data->averageMonthlyIncome);
            $client->setContactName($data->contactName);
            $client->setContactTitle($data->contactTitle);
            $client->setContactForname($data->contactForname);
            $client->setContactPhone1($data->contactPhone1);
            $client->setContactEmail($data->contactEmail);
            $client->setContactPhone2($data->contactPhone2);
            $client->setContactPhone3($data->contactPhone3);
            $client->setContactPhone4($data->contactPhone4);
            $client->setProspectNumber($data->prospectNumber);
            $client->setClientStatus($data->clientStatus);
            $client->setContactDetailsModif($data->contactDetailsModif);
            $client->setPersonalDetailsModif($data->personalDetailsModif);
            $client->setEmploymentModif($data->employmentModif);
            $client->setDrivingLicence($data->drivingLicence);
            $client->setMaritalStatus($data->maritalStatus);
            $client->setChildren($data->children);
            $client->setClientSince($data->clientSince ? new \DateTime($data->clientSince) : null);
            $client->setContactRemarks($data->contactRemarks);
            $client->setDrivingRemarks($data->drivingRemarks);

            // Persist the entity
            try {
                $this->entityManager->persist($client);
                $this->entityManager->flush();

                // Rafraîchir l'entité pour récupérer les valeurs générées par le déclencheur SQL
                if (empty($uriVariables)) {
                    $this->entityManager->refresh($client);
                }
            } catch (\Exception $e) {
                throw new BadRequestHttpException('Failed to save client: ' . $e->getMessage());
            }

            // Map Entity back to DTO for response
            $dto = new ClientDto();
            $dto->id = $client->getId(); // Ajouter l'ID explicitement
            $dto->crmClientRef = $client->getCrmClientRef();
            $dto->swanClientRef = $client->getSwanClientRef();
            $dto->title = $client->getTitle();
            $dto->surname = $client->getSurname();
            $dto->forename = $client->getForename();
            $dto->spouseFullName = $client->getSpouseFullName();
            $dto->dtClientRef = $client->getDtClientRef();
            $dto->street = $client->getStreet();
            $dto->street2 = $client->getStreet2();
            $dto->town = $client->getTown();
            $dto->zipCode = $client->getZipCode();
            $dto->nationalId = $client->getNationalId();
            $dto->dateOfBirth = $client->getDateOfBirth() ? $client->getDateOfBirth()->format('Y-m-d') : null;
            $dto->nationality = $client->getNationality();
            $dto->passportNo = $client->getPassportNo();
            $dto->phone1 = $client->getPhone1();
            $dto->phone2 = $client->getPhone2();
            $dto->phone3 = $client->getPhone3();
            $dto->phone4 = $client->getPhone4();
            $dto->emailAddress1 = $client->getEmailAddress1();
            $dto->kycIndicator = $client->getKycIndicator();
            $dto->employmentStatus = $client->getEmploymentStatus();
            $dto->jobTitle = $client->getJobTitle();
            $dto->employerName = $client->getEmployerName();
            $dto->employerAddress = $client->getEmployerAddress();
            $dto->brn = $client->getBrn();
            $dto->sourceOfFunds = $client->getSourceOfFunds();
            $dto->averageMonthlyIncome = $client->getAverageMonthlyIncome();
            $dto->contactName = $client->getContactName();
            $dto->contactTitle = $client->getContactTitle();
            $dto->contactForname = $client->getContactForname();
            $dto->contactPhone1 = $client->getContactPhone1();
            $dto->contactEmail = $client->getContactEmail();
            $dto->contactPhone2 = $client->getContactPhone2();
            $dto->contactPhone3 = $client->getContactPhone3();
            $dto->contactPhone4 = $client->getContactPhone4();
            $dto->prospectNumber = $client->getProspectNumber();
            $dto->clientStatus = $client->getClientStatus();
            $dto->contactDetailsModif = $client->getContactDetailsModif();
            $dto->personalDetailsModif = $client->getPersonalDetailsModif();
            $dto->employmentModif = $client->getEmploymentModif();
            $dto->drivingLicence = $client->getDrivingLicence();
            $dto->maritalStatus = $client->getMaritalStatus();
            $dto->children = $client->getChildren();
            $dto->clientSince = $client->getClientSince() ? $client->getClientSince()->format('Y-m-d') : null;
            $dto->contactRemarks = $client->getContactRemarks();
            $dto->drivingRemarks = $client->getDrivingRemarks();

            return $dto;
        }

        throw new BadRequestHttpException('Invalid data type');
    }
}