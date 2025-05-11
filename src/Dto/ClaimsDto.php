<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class ClaimsDto
{
    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('Col1')]
    public ?string $col1 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('Col2')]
    public ?string $col2 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('Col3')]
    public ?string $col3 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('ACC_MONTH')]
    public ?string $accMonth = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('ACC_YEAR')]
    public ?string $accYear = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('CLAIM_NO')]
    public ?string $claimNo = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'DATE_OF_ACCIDENT must be in YYYY-MM-DD format')]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('DATE_OF_ACCIDENT')]
    public ?string $dateOfAccident = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $crmClientRef = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('Title')]
    public ?string $title = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('SURNAME')]
    public ?string $surname = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('FORENAME')]
    public ?string $forename = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_VEH_NO')]
    public ?string $insVehNo = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_VEH_MAKE')]
    public ?string $insVehMake = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_LIABILITY')]
    public ?string $insLiability = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_GARAGE')]
    public ?string $insGarage = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_SURVEYOR_1')]
    public ?string $insSurveyor1 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_SURVEYOR_2')]
    public ?string $insSurveyor2 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_CAR_RENTAL')]
    public ?string $insCarRental = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_VEH_NO')]
    public ?string $tpVehNo = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_TITLE')]
    public ?string $tpTitle = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_NAME')]
    public ?string $tpName = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_FORNAME')]
    public ?string $tpForname = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_INSURANCE')]
    public ?string $tpInsurance = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_LIABILITY')]
    public ?string $tpLiability = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_GARAGE')]
    public ?string $tpGarage = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_SURVEYOR_1')]
    public ?string $tpSurveyor1 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_SURVEYOR_2')]
    public ?string $tpSurveyor2 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_CAR_RENTAL')]
    public ?string $tpCarRental = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('STATUS')]
    public ?string $status = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('case_stage_reached')]
    public ?string $caseStageReached = null;

    #[Assert\PositiveOrZero]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('Claim_Count')]
    public ?int $claimCount = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_Number')]
    public ?string $tpNumber = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Driver_name')]
    public ?string $insDriverName = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Driver_address_1')]
    public ?string $insDriverAddress1 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Driver_address_2')]
    public ?string $insDriverAddress2 = null;

    #[Assert\PositiveOrZero]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Driver_age')]
    public ?int $insDriverAge = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Driver_exp')]
    public ?string $insDriverExp = null;

    #[Assert\Email]
    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Driver_email')]
    public ?string $insDriverEmail = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Policy_No')]
    public ?string $insPolicyNo = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'INS_period_of_ins_FROM must be in YYYY-MM-DD format')]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_period_of_ins_FROM')]
    public ?string $insPeriodOfInsFrom = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'INS_period_of_ins_TO must be in YYYY-MM-DD format')]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_period_of_ins_TO')]
    public ?string $insPeriodOfInsTo = null;

    #[Assert\PositiveOrZero]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('Sum_insured')]
    public ?float $sumInsured = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Accessories')]
    public ?string $insAccessories = null;

    #[Assert\PositiveOrZero]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Accessories_Rs')]
    public ?float $insAccessoriesRs = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Year')]
    public ?string $insYear = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Leasing')]
    public ?string $insLeasing = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Engine_Rating')]
    public ?string $insEngineRating = null;

    #[Assert\PositiveOrZero]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Comp_Excess')]
    public ?float $insCompExcess = null;

    #[Assert\PositiveOrZero]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Vol_Excess')]
    public ?float $insVolExcess = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Special_Terms_6')]
    public ?string $insSpecialTerms6 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Cert_Type')]
    public ?string $insCertType = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Cert_No')]
    public ?string $insCertNo = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Incl_Reg_Fees')]
    public ?string $insInclRegFees = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Excess_Waiver')]
    public ?string $insExcessWaiver = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Rodent')]
    public ?string $insRodent = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_LOU')]
    public ?string $insLou = null;

    #[Assert\PositiveOrZero]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_no_of_days')]
    public ?int $insNoOfDays = null;

    #[Assert\PositiveOrZero]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_Limit_LOU')]
    public ?float $insLimitLou = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('INS_As_per_ASF_A_or_B')]
    public ?string $insAsPerAsfAOrB = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_Driver_name')]
    public ?string $tpDriverName = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_Address_1')]
    public ?string $tpAddress1 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_Address_2')]
    public ?string $tpAddress2 = null;

    #[Assert\Email]
    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_Email')]
    public ?string $tpEmail = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_Contact_No')]
    public ?string $tpContactNo = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_Make_Model')]
    public ?string $tpMakeModel = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_Leasing')]
    public ?string $tpLeasing = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('TP_As_per_ASF_A_or_B')]
    public ?string $tpAsPerAsfAOrB = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'DoA must be in YYYY-MM-DD format')]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('DoA')]
    public ?string $doa = null;

    #[Assert\Regex(pattern: '/^([0-1][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/', message: 'ToA must be in HH:MM:SS format')]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('ToA')]
    public ?string $toa = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('PoA')]
    public ?string $poa = null;

    #[Assert\Length(max: 255)]
    #[Groups(['claims:read', 'claims:write'])]
    #[SerializedName('Same_as_Insured')]
    public ?string $sameAsInsured = null;
}