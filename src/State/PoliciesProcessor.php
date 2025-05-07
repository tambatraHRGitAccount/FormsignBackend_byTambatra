<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\PoliciesDto;
use App\Entity\Policies;
use Doctrine\ORM\EntityManagerInterface;

class PoliciesProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($operation instanceof Delete) {
            $policies = $this->entityManager->getRepository(Policies::class)->find($uriVariables['id']);
            if ($policies) {
                $this->entityManager->remove($policies);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof PoliciesDto) {
            if (!empty($uriVariables)) {
                $policies = $this->entityManager->getRepository(Policies::class)->find($uriVariables['id']);
                if (!$policies) {
                    throw new \RuntimeException('Policies not found');
                }
            } else {
                $policies = new Policies();
            }

            $policies->setPolicy($data->policy);
            $policies->setQbInvNum($data->qbInvNum);
            $policies->setSwanClientRef($data->swanClientRef);
            $policies->setFullName($data->fullName);
            $policies->setDateFrom($data->dateFrom ? new \DateTime($data->dateFrom) : null);
            $policies->setDateTo($data->dateTo ? new \DateTime($data->dateTo) : null);
            $policies->setPremium($data->premium);
            $policies->setCashCreditTransac($data->cashCreditTransac);
            $policies->setRegistrationNumber($data->registrationNumber);
            $policies->setSumInsured($data->sumInsured);
            $policies->setGrossPremium($data->grossPremium);
            $policies->setRate($data->rate);
            $policies->setExcess($data->excess);
            $policies->setNetPremium($data->netPremium);
            $policies->setAccMonth($data->accMonth);
            $policies->setAccYear($data->accYear);
            $policies->setPlacingNumber($data->placingNumber);
            $policies->setCrmClientRef($data->crmClientRef);
            $policies->setTransact($data->transact);
            $policies->setMotorCertificate($data->motorCertificate);
            $policies->setMakeModel($data->makeModel);
            $policies->setYear($data->year);
            $policies->setMonth($data->month);
            $policies->setHp($data->hp);
            $policies->setBodyType($data->bodyType);
            $policies->setDaysLou($data->daysLou);
            $policies->setLimitLou($data->limitLou);
            $policies->setAic($data->aic);
            $policies->setNafew($data->nafew);
            $policies->setTypeOfInsurance($data->typeOfInsurance);
            $policies->setTypeOfCover($data->typeOfCover);
            $policies->setMake($data->make);
            $policies->setModel($data->model);
            $policies->setIntroducer($data->introducer);
            $policies->setLeasing($data->leasing);
            $policies->setLien($data->lien);
            $policies->setTrasacDate($data->trasacDate ? new \DateTime($data->trasacDate) : null);
            $policies->setField37($data->field37);
            $policies->setField38($data->field38);
            $policies->setField39($data->field39);
            $policies->setField40($data->field40);
            $policies->setField41($data->field41);
            $policies->setField42($data->field42);
            $policies->setField43($data->field43);
            $policies->setQbClientName($data->qbClientName);
            $policies->setExportedToQb($data->exportedToQb);
            $policies->setSentToSwan($data->sentToSwan);

            $this->entityManager->persist($policies);
            $this->entityManager->flush();

            $dto = new PoliciesDto();
            $dto->policy = $policies->getPolicy();
            $dto->qbInvNum = $policies->getQbInvNum();
            $dto->swanClientRef = $policies->getSwanClientRef();
            $dto->fullName = $policies->getFullName();
            $dto->dateFrom = $policies->getDateFrom() ? $policies->getDateFrom()->format('Y-m-d') : null;
            $dto->dateTo = $policies->getDateTo() ? $policies->getDateTo()->format('Y-m-d') : null;
            $dto->premium = $policies->getPremium();
            $dto->cashCreditTransac = $policies->getCashCreditTransac();
            $dto->registrationNumber = $policies->getRegistrationNumber();
            $dto->sumInsured = $policies->getSumInsured();
            $dto->grossPremium = $policies->getGrossPremium();
            $dto->rate = $policies->getRate();
            $dto->excess = $policies->getExcess();
            $dto->netPremium = $policies->getNetPremium();
            $dto->accMonth = $policies->getAccMonth();
            $dto->accYear = $policies->getAccYear();
            $dto->placingNumber = $policies->getPlacingNumber();
            $dto->crmClientRef = $policies->getCrmClientRef();
            $dto->transact = $policies->getTransact();
            $dto->motorCertificate = $policies->getMotorCertificate();
            $dto->makeModel = $policies->getMakeModel();
            $dto->year = $policies->getYear();
            $dto->month = $policies->getMonth();
            $dto->hp = $policies->getHp();
            $dto->bodyType = $policies->getBodyType();
            $dto->daysLou = $policies->getDaysLou();
            $dto->limitLou = $policies->getLimitLou();
            $dto->aic = $policies->getAic();
            $dto->nafew = $policies->getNafew();
            $dto->typeOfInsurance = $policies->getTypeOfInsurance();
            $dto->typeOfCover = $policies->getTypeOfCover();
            $dto->make = $policies->getMake();
            $dto->model = $policies->getModel();
            $dto->introducer = $policies->getIntroducer();
            $dto->leasing = $policies->getLeasing();
            $dto->lien = $policies->getLien();
            $dto->trasacDate = $policies->getTrasacDate() ? $policies->getTrasacDate()->format('Y-m-d') : null;
            $dto->field37 = $policies->getField37();
            $dto->field38 = $policies->getField38();
            $dto->field39 = $policies->getField39();
            $dto->field40 = $policies->getField40();
            $dto->field41 = $policies->getField41();
            $dto->field42 = $policies->getField42();
            $dto->field43 = $policies->getField43();
            $dto->qbClientName = $policies->getQbClientName();
            $dto->exportedToQb = $policies->getExportedToQb();
            $dto->sentToSwan = $policies->getSentToSwan();

            return $dto;
        }

        throw new \RuntimeException('Invalid data type');
    }
}