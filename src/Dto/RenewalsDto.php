<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class RenewalsDto
{
    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('DESCRIPTION')]
    public ?string $description = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('POLRSK')]
    public ?string $polrsk = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('POLCD')]
    public ?string $polcd = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('POLSER')]
    public ?string $polser = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('AGENCY')]
    public ?string $agency = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('MOTPLAN')]
    public ?string $motplan = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('CLIENT')]
    public ?string $client = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('NAME')]
    public ?string $name = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'DTFROM must be in YYYY-MM-DD format')]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('DTFROM')]
    public ?string $dtfrom = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'DTTO must be in YYYY-MM-DD format')]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('DTTO')]
    public ?string $dtto = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('REGNO')]
    public ?string $regno = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('MODEL')]
    public ?string $model = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('GRP')]
    public ?string $grp = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('HPCC')]
    public ?string $hpcc = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('USED')]
    public ?string $used = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('INS')]
    public ?string $ins = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('YR')]
    public ?string $yr = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('EXCESS')]
    public ?float $excess = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('SUM')]
    public ?float $sum = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('SUMS_VEH')]
    public ?float $sumsVeh = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('SUMS_TRL')]
    public ?float $sumsTrl = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('PREV_RATE')]
    public ?float $prevRate = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('PREV_PREM')]
    public ?float $prevPrem = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('NEW_RATE')]
    public ?float $newRate = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('LOADING')]
    public ?float $loading = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('OTHER_INS_DISC')]
    public ?float $otherInsDisc = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('LOADING1')]
    public ?float $loading1 = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('BASIC')]
    public ?float $basic = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('L_USE')]
    public ?string $lUse = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('AIC')]
    public ?string $aic = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('DACC')]
    public ?string $dacc = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('ALLOYPREM')]
    public ?float $alloyprem = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('FGAPPREM')]
    public ?float $fgapprem = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('REPCARPREM')]
    public ?float $repcarprem = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('XSWAIVPREM')]
    public ?float $xswaivprem = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('PASTERPREM')]
    public ?float $pasterprem = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('RODENTPREM')]
    public ?float $rodentprem = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('TOTAL')]
    public ?float $total = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('PREMIUM')]
    public ?float $premium = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('POLICY_FEE')]
    public ?float $policyFee = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('FSC_FEE')]
    public ?float $fscFee = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('PAYABLE')]
    public ?float $payable = null;

    #[Assert\Length(max: 255)]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('REMARKS')]
    public ?string $remarks = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('REVISED_SUM_INSURED')]
    public ?float $revisedSumInsured = null;

    #[Assert\PositiveOrZero]
    #[Groups(['renewals:read', 'renewals:write'])]
    #[SerializedName('REVISED_PREMIUM')]
    public ?float $revisedPremium = null;
}