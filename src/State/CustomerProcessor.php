<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\CustomerDto;
use App\Entity\Customer;
use App\Entity\Person;
use App\Repository\PersonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CustomerProcessor implements ProcessorInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private PersonRepository $personRepository
    ) {
    }

    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if (!$data instanceof CustomerDto) {
            throw new BadRequestHttpException('Invalid input data');
        }

        $customer = $operation->getName() === 'post' ? new Customer() : $this->entityManager->getRepository(Customer::class)->find($uriVariables['id']);

        if (!$customer) {
            throw new BadRequestHttpException('Customer not found');
        }

        // Map DTO to Entity
        $customer->setSurname($data->surname);
        $customer->setForename($data->forename);
        $customer->setTitle($data->title);
        $customer->setStreet($data->street);
        $customer->setStreet2($data->street2);
        $customer->setTown($data->town);
        $customer->setZipCode($data->zipCode);
        $customer->setNationalId($data->nationalId);
        $customer->setDateOfBirth($data->dateOfBirth);
        $customer->setNationality($data->nationality);
        $customer->setPassport($data->passport);
        $customer->setPhone1($data->phone1);
        $customer->setPhone2($data->phone2);
        $customer->setPhone3($data->phone3);
        $customer->setPhone4($data->phone4);
        $customer->setEmail($data->email);
        $customer->setStatus($data->status);
        $customer->setRemark($data->remark);
        $customer->setCrmClientRef($data->crmClientRef);
        $customer->setSwanClientRef($data->swanClientRef);
        $customer->setDtclientRef($data->dtclientRef);
        $customer->setJobTitle($data->jobTitle);
        $customer->setVanillaLoversLtd($data->vanillaLoversLtd);
        $customer->setEmployerAddress($data->employerAddress);
        $customer->setBrn($data->brn);
        $customer->setSourceOfFunds($data->sourceOfFunds);
        $customer->setAverageMonthlyIncome($data->averageMonthlyIncome);
        $customer->setDrivingLicence($data->drivingLicence);
        $customer->setMaritalStatus($data->maritalStatus);
        $customer->setKycIndicator($data->kycIndicator);
        $customer->setProspectNumber($data->prospectNumber);
        $customer->setEmployerName($data->employerName);

        // Handle relationships
        if ($data->personToContactId) {
            $personToContact = $this->personRepository->find($data->personToContactId);
            if (!$personToContact) {
                throw new BadRequestHttpException('Person to contact not found');
            }
            $customer->setPersonToContact($personToContact);
        } else {
            $customer->setPersonToContact(null);
        }

        if ($data->spouseId) {
            $spouse = $this->personRepository->find($data->spouseId);
            if (!$spouse) {
                throw new BadRequestHttpException('Spouse not found');
            }
            $customer->setSpouse($spouse);
        } else {
            $customer->setSpouse(null);
        }

        $this->entityManager->persist($customer);
        $this->entityManager->flush();

        // Map back to DTO for response
        $dto = new CustomerDto();
        $dto->id = $customer->getId();
        $dto->surname = $customer->getSurname();
        $dto->forename = $customer->getForename();
        $dto->title = $customer->getTitle();
        $dto->street = $customer->getStreet();
        $dto->street2 = $customer->getStreet2();
        $dto->town = $customer->getTown();
        $dto->zipCode = $customer->getZipCode();
        $dto->nationalId = $customer->getNationalId();
        $dto->dateOfBirth = $customer->getDateOfBirth();
        $dto->nationality = $customer->getNationality();
        $dto->passport = $customer->getPassport();
        $dto->phone1 = $customer->getPhone1();
        $dto->phone2 = $customer->getPhone2();
        $dto->phone3 = $customer->getPhone3();
        $dto->phone4 = $customer->getPhone4();
        $dto->email = $customer->getEmail();
        $dto->status = $customer->getStatus();
        $dto->remark = $customer->getRemark();
        $dto->personToContactId = $customer->getPersonToContact()?->getId();
        $dto->crmClientRef = $customer->getCrmClientRef();
        $dto->swanClientRef = $customer->getSwanClientRef();
        $dto->dtclientRef = $customer->getDtclientRef();
        $dto->jobTitle = $customer->getJobTitle();
        $dto->vanillaLoversLtd = $customer->getVanillaLoversLtd();
        $dto->employerAddress = $customer->getEmployerAddress();
        $dto->brn = $customer->getBrn();
        $dto->sourceOfFunds = $customer->getSourceOfFunds();
        $dto->averageMonthlyIncome = $customer->getAverageMonthlyIncome();
        $dto->drivingLicence = $customer->getDrivingLicence();
        $dto->maritalStatus = $customer->getMaritalStatus();
        $dto->kycIndicator = $customer->getKycIndicator();
        $dto->prospectNumber = $customer->getProspectNumber();
        $dto->employerName = $customer->getEmployerName();
        $dto->spouseId = $customer->getSpouse()?->getId();

        return $dto;
    }
}