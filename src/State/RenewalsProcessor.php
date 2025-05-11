<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\RenewalsDto;
use App\Entity\Renewals;
use Doctrine\ORM\EntityManagerInterface;

class RenewalsProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($operation instanceof Delete) {
            $renewal = $this->entityManager->getRepository(Renewals::class)->find($uriVariables['id']);
            if ($renewal) {
                $this->entityManager->remove($renewal);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof RenewalsDto) {
            if (!empty($uriVariables)) {
                $renewal = $this->entityManager->getRepository(Renewals::class)->find($uriVariables['id']);
                if (!$renewal) {
                    throw new \RuntimeException('Renewal not found');
                }
            } else {
                $renewal = new Renewals();
            }

            $renewal->setDescription($data->description);
            $renewal->setPolrsk($data->polrsk);
            $renewal->setPolcd($data->polcd);
            $renewal->setPolser($data->polser);
            $renewal->setAgency($data->agency);
            $renewal->setMotplan($data->motplan);
            $renewal->setClient($data->client);
            $renewal->setName($data->name);
            $renewal->setDtfrom($data->dtfrom ? new \DateTime($data->dtfrom) : null);
            $renewal->setDtto($data->dtto ? new \DateTime($data->dtto) : null);
            $renewal->setRegno($data->regno);
            $renewal->setModel($data->model);
            $renewal->setGrp($data->grp);
            $renewal->setHpcc($data->hpcc);
            $renewal->setUsed($data->used);
            $renewal->setIns($data->ins);
            $renewal->setYr($data->yr);
            $renewal->setExcess($data->excess);
            $renewal->setSum($data->sum);
            $renewal->setSumsVeh($data->sumsVeh);
            $renewal->setSumsTrl($data->sumsTrl);
            $renewal->setPrevRate($data->prevRate);
            $renewal->setPrevPrem($data->prevPrem);
            $renewal->setNewRate($data->newRate);
            $renewal->setLoading($data->loading);
            $renewal->setOtherInsDisc($data->otherInsDisc);
            $renewal->setLoading1($data->loading1);
            $renewal->setBasic($data->basic);
            $renewal->setLUse($data->lUse);
            $renewal->setAic($data->aic);
            $renewal->setDacc($data->dacc);
            $renewal->setAlloyprem($data->alloyprem);
            $renewal->setFgapprem($data->fgapprem);
            $renewal->setRepcarprem($data->repcarprem);
            $renewal->setXswaivprem($data->xswaivprem);
            $renewal->setPasterprem($data->pasterprem);
            $renewal->setRodentprem($data->rodentprem);
            $renewal->setTotal($data->total);
            $renewal->setPremium($data->premium);
            $renewal->setPolicyFee($data->policyFee);
            $renewal->setFscFee($data->fscFee);
            $renewal->setPayable($data->payable);
            $renewal->setRemarks($data->remarks);
            $renewal->setRevisedSumInsured($data->revisedSumInsured);
            $renewal->setRevisedPremium($data->revisedPremium);

            $this->entityManager->persist($renewal);
            $this->entityManager->flush();

            $dto = new RenewalsDto();
            $dto->description = $renewal->getDescription();
            $dto->polrsk = $renewal->getPolrsk();
            $dto->polcd = $renewal->getPolcd();
            $dto->polser = $renewal->getPolser();
            $dto->agency = $renewal->getAgency();
            $dto->motplan = $renewal->getMotplan();
            $dto->client = $renewal->getClient();
            $dto->name = $renewal->getName();
            $dto->dtfrom = $renewal->getDtfrom() ? $renewal->getDtfrom()->format('Y-m-d') : null;
            $dto->dtto = $renewal->getDtto() ? $renewal->getDtto()->format('Y-m-d') : null;
            $dto->regno = $renewal->getRegno();
            $dto->model = $renewal->getModel();
            $dto->grp = $renewal->getGrp();
            $dto->hpcc = $renewal->getHpcc();
            $dto->used = $renewal->getUsed();
            $dto->ins = $renewal->getIns();
            $dto->yr = $renewal->getYr();
            $dto->excess = $renewal->getExcess();
            $dto->sum = $renewal->getSum();
            $dto->sumsVeh = $renewal->getSumsVeh();
            $dto->sumsTrl = $renewal->getSumsTrl();
            $dto->prevRate = $renewal->getPrevRate();
            $dto->prevPrem = $renewal->getPrevPrem();
            $dto->newRate = $renewal->getNewRate();
            $dto->loading = $renewal->getLoading();
            $dto->otherInsDisc = $renewal->getOtherInsDisc();
            $dto->loading1 = $renewal->getLoading1();
            $dto->basic = $renewal->getBasic();
            $dto->lUse = $renewal->getLUse();
            $dto->aic = $renewal->getAic();
            $dto->dacc = $renewal->getDacc();
            $dto->alloyprem = $renewal->getAlloyprem();
            $dto->fgapprem = $renewal->getFgapprem();
            $dto->repcarprem = $renewal->getRepcarprem();
            $dto->xswaivprem = $renewal->getXswaivprem();
            $dto->pasterprem = $renewal->getPasterprem();
            $dto->rodentprem = $renewal->getRodentprem();
            $dto->total = $renewal->getTotal();
            $dto->premium = $renewal->getPremium();
            $dto->policyFee = $renewal->getPolicyFee();
            $dto->fscFee = $renewal->getFscFee();
            $dto->payable = $renewal->getPayable();
            $dto->remarks = $renewal->getRemarks();
            $dto->revisedSumInsured = $renewal->getRevisedSumInsured();
            $dto->revisedPremium = $renewal->getRevisedPremium();

            return $dto;
        }

        throw new \RuntimeException('Invalid data type');
    }
}