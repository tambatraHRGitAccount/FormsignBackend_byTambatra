<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\ClaimsDto;
use App\Entity\Claims;
use Doctrine\ORM\EntityManagerInterface;

class ClaimsProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($operation instanceof Delete) {
            $claim = $this->entityManager->getRepository(Claims::class)->find($uriVariables['id']);
            if ($claim) {
                $this->entityManager->remove($claim);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof ClaimsDto) {
            if (!empty($uriVariables)) {
                $claim = $this->entityManager->getRepository(Claims::class)->find($uriVariables['id']);
                if (!$claim) {
                    throw new \RuntimeException('Claim not found');
                }
            } else {
                $claim = new Claims();
            }

            $claim->setCol1($data->col1);
            $claim->setCol2($data->col2);
            $claim->setCol3($data->col3);
            $claim->setAccMonth($data->accMonth);
            $claim->setAccYear($data->accYear);
            $claim->setClaimNo($data->claimNo);
            $claim->setDateOfAccident($data->dateOfAccident ? new \DateTime($data->dateOfAccident) : null);
            $claim->setCrmClientRef($data->crmClientRef);
            $claim->setTitle($data->title);
            $claim->setSurname($data->surname);
            $claim->setForename($data->forename);
            $claim->setInsVehNo($data->insVehNo);
            $claim->setInsVehMake($data->insVehMake);
            $claim->setInsLiability($data->insLiability);
            $claim->setInsGarage($data->insGarage);
            $claim->setInsSurveyor1($data->insSurveyor1);
            $claim->setInsSurveyor2($data->insSurveyor2);
            $claim->setInsCarRental($data->insCarRental);
            $claim->setTpVehNo($data->tpVehNo);
            $claim->setTpTitle($data->tpTitle);
            $claim->setTpName($data->tpName);
            $claim->setTpForname($data->tpForname);
            $claim->setTpInsurance($data->tpInsurance);
            $claim->setTpLiability($data->tpLiability);
            $claim->setTpGarage($data->tpGarage);
            $claim->setTpSurveyor1($data->tpSurveyor1);
            $claim->setTpSurveyor2($data->tpSurveyor2);
            $claim->setTpCarRental($data->tpCarRental);
            $claim->setStatus($data->status);
            $claim->setCaseStageReached($data->caseStageReached);
            $claim->setClaimCount($data->claimCount);
            $claim->setTpNumber($data->tpNumber);
            $claim->setInsDriverName($data->insDriverName);
            $claim->setInsDriverAddress1($data->insDriverAddress1);
            $claim->setInsDriverAddress2($data->insDriverAddress2);
            $claim->setInsDriverAge($data->insDriverAge);
            $claim->setInsDriverExp($data->insDriverExp);
            $claim->setInsDriverEmail($data->insDriverEmail);
            $claim->setInsPolicyNo($data->insPolicyNo);
            $claim->setInsPeriodOfInsFrom($data->insPeriodOfInsFrom ? new \DateTime($data->insPeriodOfInsFrom) : null);
            $claim->setInsPeriodOfInsTo($data->insPeriodOfInsTo ? new \DateTime($data->insPeriodOfInsTo) : null);
            $claim->setSumInsured($data->sumInsured);
            $claim->setInsAccessories($data->insAccessories);
            $claim->setInsAccessoriesRs($data->insAccessoriesRs);
            $claim->setInsYear($data->insYear);
            $claim->setInsLeasing($data->insLeasing);
            $claim->setInsEngineRating($data->insEngineRating);
            $claim->setInsCompExcess($data->insCompExcess);
            $claim->setInsVolExcess($data->insVolExcess);
            $claim->setInsSpecialTerms6($data->insSpecialTerms6);
            $claim->setInsCertType($data->insCertType);
            $claim->setInsCertNo($data->insCertNo);
            $claim->setInsInclRegFees($data->insInclRegFees);
            $claim->setInsExcessWaiver($data->insExcessWaiver);
            $claim->setInsRodent($data->insRodent);
            $claim->setInsLou($data->insLou);
            $claim->setInsNoOfDays($data->insNoOfDays);
            $claim->setInsLimitLou($data->insLimitLou);
            $claim->setInsAsPerAsfAOrB($data->insAsPerAsfAOrB);
            $claim->setTpDriverName($data->tpDriverName);
            $claim->setTpAddress1($data->tpAddress1);
            $claim->setTpAddress2($data->tpAddress2);
            $claim->setTpEmail($data->tpEmail);
            $claim->setTpContactNo($data->tpContactNo);
            $claim->setTpMakeModel($data->tpMakeModel);
            $claim->setTpLeasing($data->tpLeasing);
            $claim->setTpAsPerAsfAOrB($data->tpAsPerAsfAOrB);
            $claim->setDoa($data->doa ? new \DateTime($data->doa) : null);
            $claim->setToa($data->toa ? new \DateTime('1970-01-01 ' . $data->toa) : null);
            $claim->setPoa($data->poa);
            $claim->setSameAsInsured($data->sameAsInsured);

            $this->entityManager->persist($claim);
            $this->entityManager->flush();

            $dto = new ClaimsDto();
            $dto->col1 = $claim->getCol1();
            $dto->col2 = $claim->getCol2();
            $dto->col3 = $claim->getCol3();
            $dto->accMonth = $claim->getAccMonth();
            $dto->accYear = $claim->getAccYear();
            $dto->claimNo = $claim->getClaimNo();
            $dto->dateOfAccident = $claim->getDateOfAccident() ? $claim->getDateOfAccident()->format('Y-m-d') : null;
            $dto->crmClientRef = $claim->getCrmClientRef();
            $dto->title = $claim->getTitle();
            $dto->surname = $claim->getSurname();
            $dto->forename = $claim->getForename();
            $dto->insVehNo = $claim->getInsVehNo();
            $dto->insVehMake = $claim->getInsVehMake();
            $dto->insLiability = $claim->getInsLiability();
            $dto->insGarage = $claim->getInsGarage();
            $dto->insSurveyor1 = $claim->getInsSurveyor1();
            $dto->insSurveyor2 = $claim->getInsSurveyor2();
            $dto->insCarRental = $claim->getInsCarRental();
            $dto->tpVehNo = $claim->getTpVehNo();
            $dto->tpTitle = $claim->getTpTitle();
            $dto->tpName = $claim->getTpName();
            $dto->tpForname = $claim->getTpForname();
            $dto->tpInsurance = $claim->getTpInsurance();
            $dto->tpLiability = $claim->getTpLiability();
            $dto->tpGarage = $claim->getTpGarage();
            $dto->tpSurveyor1 = $claim->getTpSurveyor1();
            $dto->tpSurveyor2 = $claim->getTpSurveyor2();
            $dto->tpCarRental = $claim->getTpCarRental();
            $dto->status = $claim->getStatus();
            $dto->caseStageReached = $claim->getCaseStageReached();
            $dto->claimCount = $claim->getClaimCount();
            $dto->tpNumber = $claim->getTpNumber();
            $dto->insDriverName = $claim->getInsDriverName();
            $dto->insDriverAddress1 = $claim->getInsDriverAddress1();
            $dto->insDriverAddress2 = $claim->getInsDriverAddress2();
            $dto->insDriverAge = $claim->getInsDriverAge();
            $dto->insDriverExp = $claim->getInsDriverExp();
            $dto->insDriverEmail = $claim->getInsDriverEmail();
            $dto->insPolicyNo = $claim->getInsPolicyNo();
            $dto->insPeriodOfInsFrom = $claim->getInsPeriodOfInsFrom() ? $claim->getInsPeriodOfInsFrom()->format('Y-m-d') : null;
            $dto->insPeriodOfInsTo = $claim->getInsPeriodOfInsTo() ? $claim->getInsPeriodOfInsTo()->format('Y-m-d') : null;
            $dto->sumInsured = $claim->getSumInsured();
            $dto->insAccessories = $claim->getInsAccessories();
            $dto->insAccessoriesRs = $claim->getInsAccessoriesRs();
            $dto->insYear = $claim->getInsYear();
            $dto->insLeasing = $claim->getInsLeasing();
            $dto->insEngineRating = $claim->getInsEngineRating();
            $dto->insCompExcess = $claim->getInsCompExcess();
            $dto->insVolExcess = $claim->getInsVolExcess();
            $dto->insSpecialTerms6 = $claim->getInsSpecialTerms6();
            $dto->insCertType = $claim->getInsCertType();
            $dto->insCertNo = $claim->getInsCertNo();
            $dto->insInclRegFees = $claim->getInsInclRegFees();
            $dto->insExcessWaiver = $claim->getInsExcessWaiver();
            $dto->insRodent = $claim->getInsRodent();
            $dto->insLou = $claim->getInsLou();
            $dto->insNoOfDays = $claim->getInsNoOfDays();
            $dto->insLimitLou = $claim->getInsLimitLou();
            $dto->insAsPerAsfAOrB = $claim->getInsAsPerAsfAOrB();
            $dto->tpDriverName = $claim->getTpDriverName();
            $dto->tpAddress1 = $claim->getTpAddress1();
            $dto->tpAddress2 = $claim->getTpAddress2();
            $dto->tpEmail = $claim->getTpEmail();
            $dto->tpContactNo = $claim->getTpContactNo();
            $dto->tpMakeModel = $claim->getTpMakeModel();
            $dto->tpLeasing = $claim->getTpLeasing();
            $dto->tpAsPerAsfAOrB = $claim->getTpAsPerAsfAOrB();
            $dto->doa = $claim->getDoa() ? $claim->getDoa()->format('Y-m-d') : null;
            $dto->toa = $claim->getToa() ? $claim->getToa()->format('H:i:s') : null;
            $dto->poa = $claim->getPoa();
            $dto->sameAsInsured = $claim->getSameAsInsured();

            return $dto;
        }

        throw new \RuntimeException('Invalid data type');
    }
}