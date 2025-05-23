<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Renewals;
use App\State\RenewalsProvider;
use Symfony\Component\Serializer\Annotation\Groups;

#[GetCollection(
    provider: RenewalsProvider::class,
    uriTemplate: '/renewals-search',
)]
#[QueryParameter(key: 'name')]
#[QueryParameter(key: 'client')]
#[QueryParameter(key: 'polcd')]
#[QueryParameter(key: 'dtfrom')]
#[QueryParameter(key: 'dtto')]
#[QueryParameter(key: 'regno')]
#[QueryParameter(key: 'premium')]
class RenewalsSearch
{
    // Properties remain unchanged
    #[Groups(['renewals:read'])]
    public ?int $id = null;

    #[Groups(['renewals:read'])]
    public ?string $description = null;

    #[Groups(['renewals:read'])]
    public ?string $polrsk = null;

    #[Groups(['renewals:read'])]
    public ?string $polcd = null;

    #[Groups(['renewals:read'])]
    public ?string $polser = null;

    #[Groups(['renewals:read'])]
    public ?string $agency = null;

    #[Groups(['renewals:read'])]
    public ?string $motplan = null;

    #[Groups(['renewals:read'])]
    public ?string $client = null;

    #[Groups(['renewals:read'])]
    public ?string $name = null;

    #[Groups(['renewals:read'])]
    public ?string $dtfrom = null;

    #[Groups(['renewals:read'])]
    public ?string $dtto = null;

    #[Groups(['renewals:read'])]
    public ?string $regno = null;

    #[Groups(['renewals:read'])]
    public ?string $model = null;

    #[Groups(['renewals:read'])]
    public ?string $grp = null;

    #[Groups(['renewals:read'])]
    public ?string $hpcc = null;

    #[Groups(['renewals:read'])]
    public ?string $used = null;

    #[Groups(['renewals:read'])]
    public ?string $ins = null;

    #[Groups(['renewals:read'])]
    public ?string $yr = null;

    #[Groups(['renewals:read'])]
    public ?float $excess = null;

    #[Groups(['renewals:read'])]
    public ?float $sum = null;

    #[Groups(['renewals:read'])]
    public ?float $sumsVeh = null;

    #[Groups(['renewals:read'])]
    public ?float $sumsTrl = null;

    #[Groups(['renewals:read'])]
    public ?float $prevRate = null;

    #[Groups(['renewals:read'])]
    public ?float $prevPrem = null;

    #[Groups(['renewals:read'])]
    public ?float $newRate = null;

    #[Groups(['renewals:read'])]
    public ?float $loading = null;

    #[Groups(['renewals:read'])]
    public ?float $otherInsDisc = null;

    #[Groups(['renewals:read'])]
    public ?float $loading1 = null;

    #[Groups(['renewals:read'])]
    public ?float $basic = null;

    #[Groups(['renewals:read'])]
    public ?string $lUse = null;

    #[Groups(['renewals:read'])]
    public ?string $aic = null;

    #[Groups(['renewals:read'])]
    public ?string $dacc = null;

    #[Groups(['renewals:read'])]
    public ?float $alloyprem = null;

    #[Groups(['renewals:read'])]
    public ?float $fgapprem = null;

    #[Groups(['renewals:read'])]
    public ?float $repcarprem = null;

    #[Groups(['renewals:read'])]
    public ?float $xswaivprem = null;

    #[Groups(['renewals:read'])]
    public ?float $pasterprem = null;

    #[Groups(['renewals:read'])]
    public ?float $rodentprem = null;

    #[Groups(['renewals:read'])]
    public ?float $total = null;

    #[Groups(['renewals:read'])]
    public ?float $premium = null;

    #[Groups(['renewals:read'])]
    public ?float $policyFee = null;

    #[Groups(['renewals:read'])]
    public ?float $fscFee = null;

    #[Groups(['renewals:read'])]
    public ?float $payable = null;

    #[Groups(['renewals:read'])]
    public ?string $remarks = null;

    #[Groups(['renewals:read'])]
    public ?float $revisedSumInsured = null;

    #[Groups(['renewals:read'])]
    public ?float $revisedPremium = null;

    public function __construct(
        ?int $id = null,
        ?string $description = null,
        ?string $polrsk = null,
        ?string $polcd = null,
        ?string $polser = null,
        ?string $agency = null,
        ?string $motplan = null,
        ?string $client = null,
        ?string $name = null,
        ?string $dtfrom = null,
        ?string $dtto = null,
        ?string $regno = null,
        ?string $model = null,
        ?string $grp = null,
        ?string $hpcc = null,
        ?string $used = null,
        ?string $ins = null,
        ?string $yr = null,
        ?float $excess = null,
        ?float $sum = null,
        ?float $sumsVeh = null,
        ?float $sumsTrl = null,
        ?float $prevRate = null,
        ?float $prevPrem = null,
        ?float $newRate = null,
        ?float $loading = null,
        ?float $otherInsDisc = null,
        ?float $loading1 = null,
        ?float $basic = null,
        ?string $lUse = null,
        ?string $aic = null,
        ?string $dacc = null,
        ?float $alloyprem = null,
        ?float $fgapprem = null,
        ?float $repcarprem = null,
        ?float $xswaivprem = null,
        ?float $pasterprem = null,
        ?float $rodentprem = null,
        ?float $total = null,
        ?float $premium = null,
        ?float $policyFee = null,
        ?float $fscFee = null,
        ?float $payable = null,
        ?string $remarks = null,
        ?float $revisedSumInsured = null,
        ?float $revisedPremium = null
    ) {
        $this->id = $id;
        $this->description = $description;
        $this->polrsk = $polrsk;
        $this->polcd = $polcd;
        $this->polser = $polser;
        $this->agency = $agency;
        $this->motplan = $motplan;
        $this->client = $client;
        $this->name = $name;
        $this->dtfrom = $dtfrom;
        $this->dtto = $dtto;
        $this->regno = $regno;
        $this->model = $model;
        $this->grp = $grp;
        $this->hpcc = $hpcc;
        $this->used = $used;
        $this->ins = $ins;
        $this->yr = $yr;
        $this->excess = $excess;
        $this->sum = $sum;
        $this->sumsVeh = $sumsVeh;
        $this->sumsTrl = $sumsTrl;
        $this->prevRate = $prevRate;
        $this->prevPrem = $prevPrem;
        $this->newRate = $newRate;
        $this->loading = $loading;
        $this->otherInsDisc = $otherInsDisc;
        $this->loading1 = $loading1;
        $this->basic = $basic;
        $this->lUse = $lUse;
        $this->aic = $aic;
        $this->dacc = $dacc;
        $this->alloyprem = $alloyprem;
        $this->fgapprem = $fgapprem;
        $this->repcarprem = $repcarprem;
        $this->xswaivprem = $xswaivprem;
        $this->pasterprem = $pasterprem;
        $this->rodentprem = $rodentprem;
        $this->total = $total;
        $this->premium = $premium;
        $this->policyFee = $policyFee;
        $this->fscFee = $fscFee;
        $this->payable = $payable;
        $this->remarks = $remarks;
        $this->revisedSumInsured = $revisedSumInsured;
        $this->revisedPremium = $revisedPremium;
    }

    public static function mapFromRenewals(Renewals $renewals): RenewalsSearch
    {
        return new RenewalsSearch(
            id: $renewals->getId(),
            description: $renewals->getDescription(),
            polrsk: $renewals->getPolrsk(),
            polcd: $renewals->getPolcd(),
            polser: $renewals->getPolser(),
            agency: $renewals->getAgency(),
            motplan: $renewals->getMotplan(),
            client: $renewals->getClient(),
            name: $renewals->getName(),
            dtfrom: $renewals->getDtfrom() ? $renewals->getDtfrom()->format('Y-m-d') : null,
            dtto: $renewals->getDtto() ? $renewals->getDtto()->format('Y-m-d') : null,
            regno: $renewals->getRegno(),
            model: $renewals->getModel(),
            grp: $renewals->getGrp(),
            hpcc: $renewals->getHpcc(),
            used: $renewals->getUsed(),
            ins: $renewals->getIns(),
            yr: $renewals->getYr(),
            excess: $renewals->getExcess(),
            sum: $renewals->getSum(),
            sumsVeh: $renewals->getSumsVeh(),
            sumsTrl: $renewals->getSumsTrl(),
            prevRate: $renewals->getPrevRate(),
            prevPrem: $renewals->getPrevPrem(),
            newRate: $renewals->getNewRate(),
            loading: $renewals->getLoading(),
            otherInsDisc: $renewals->getOtherInsDisc(),
            loading1: $renewals->getLoading1(),
            basic: $renewals->getBasic(),
            lUse: $renewals->getLUse(),
            aic: $renewals->getAic(),
            dacc: $renewals->getDacc(),
            alloyprem: $renewals->getAlloyprem(),
            fgapprem: $renewals->getFgapprem(),
            repcarprem: $renewals->getRepcarprem(),
            xswaivprem: $renewals->getXswaivprem(),
            pasterprem: $renewals->getPasterprem(),
            rodentprem: $renewals->getRodentprem(),
            total: $renewals->getTotal(),
            premium: $renewals->getPremium(),
            policyFee: $renewals->getPolicyFee(),
            fscFee: $renewals->getFscFee(),
            payable: $renewals->getPayable(),
            remarks: $renewals->getRemarks(),
            revisedSumInsured: $renewals->getRevisedSumInsured(),
            revisedPremium: $renewals->getRevisedPremium()
        );
    }
}