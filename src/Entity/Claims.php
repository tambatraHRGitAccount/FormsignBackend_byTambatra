<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\ClaimsDto;
use App\State\ClaimsProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'claims')]
#[ApiResource(
    operations: [
        new Get(
            output: ClaimsDto::class
        ),
        new GetCollection(
            output: ClaimsDto::class
        ),
        new Post(
            input: ClaimsDto::class,
            output: ClaimsDto::class,
            processor: ClaimsProcessor::class
        ),
        new Put(
            input: ClaimsDto::class,
            output: ClaimsDto::class,
            processor: ClaimsProcessor::class
        ),
        new Delete(
            processor: ClaimsProcessor::class
        ),
    ],
    normalizationContext: ['groups' => ['claims:read']],
    denormalizationContext: ['groups' => ['claims:write']]
)]
class Claims
{
    #[ORM\Id]
    #[ORM\Column(type: 'bigint')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Col1')]
    private ?string $col1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Col2')]
    private ?string $col2 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Col3')]
    private ?string $col3 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'ACC_MONTH')]
    private ?string $accMonth = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'ACC_YEAR')]
    private ?string $accYear = null;

    #[ORM\Column(type: 'string', length: 255, unique: true, name: 'CLAIM_NO')]
    private ?string $claimNo = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'DATE_OF_ACCIDENT')]
    private ?\DateTimeInterface $dateOfAccident = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CRMClientRef')]
    private ?string $crmClientRef = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Title')]
    private ?string $title = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'SURNAME')]
    private ?string $surname = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'FORENAME')]
    private ?string $forename = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_VEH_NO')]
    private ?string $insVehNo = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_VEH_MAKE')]
    private ?string $insVehMake = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_LIABILITY')]
    private ?string $insLiability = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_GARAGE')]
    private ?string $insGarage = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_SURVEYOR_1')]
    private ?string $insSurveyor1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_SURVEYOR_2')]
    private ?string $insSurveyor2 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_CAR_RENTAL')]
    private ?string $insCarRental = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_VEH_NO')]
    private ?string $tpVehNo = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_TITLE')]
    private ?string $tpTitle = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_NAME')]
    private ?string $tpName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_FORNAME')]
    private ?string $tpForname = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_INSURANCE')]
    private ?string $tpInsurance = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_LIABILITY')]
    private ?string $tpLiability = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_GARAGE')]
    private ?string $tpGarage = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_SURVEYOR_1')]
    private ?string $tpSurveyor1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_SURVEYOR_2')]
    private ?string $tpSurveyor2 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_CAR_RENTAL')]
    private ?string $tpCarRental = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'STATUS')]
    private ?string $status = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'case_stage_reached')]
    private ?string $caseStageReached = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'Claim_Count')]
    private ?int $claimCount = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_Number')]
    private ?string $tpNumber = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Driver_name')]
    private ?string $insDriverName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Driver_address_1')]
    private ?string $insDriverAddress1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Driver_address_2')]
    private ?string $insDriverAddress2 = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'INS_Driver_age')]
    private ?int $insDriverAge = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Driver_exp')]
    private ?string $insDriverExp = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Driver_email')]
    private ?string $insDriverEmail = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Policy_No')]
    private ?string $insPolicyNo = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'INS_period_of_ins_FROM')]
    private ?\DateTimeInterface $insPeriodOfInsFrom = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'INS_period_of_ins_TO')]
    private ?\DateTimeInterface $insPeriodOfInsTo = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'Sum_insured')]
    private ?float $sumInsured = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Accessories')]
    private ?string $insAccessories = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'INS_Accessories_Rs')]
    private ?float $insAccessoriesRs = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Year')]
    private ?string $insYear = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Leasing')]
    private ?string $insLeasing = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Engine_Rating')]
    private ?string $insEngineRating = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'INS_Comp_Excess')]
    private ?float $insCompExcess = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'INS_Vol_Excess')]
    private ?float $insVolExcess = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Special_Terms_6')]
    private ?string $insSpecialTerms6 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Cert_Type')]
    private ?string $insCertType = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Cert_No')]
    private ?string $insCertNo = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Incl_Reg_Fees')]
    private ?string $insInclRegFees = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Excess_Waiver')]
    private ?string $insExcessWaiver = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_Rodent')]
    private ?string $insRodent = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_LOU')]
    private ?string $insLou = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'INS_no_of_days')]
    private ?int $insNoOfDays = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'INS_Limit_LOU')]
    private ?float $insLimitLou = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'INS_As_per_ASF_A_or_B')]
    private ?string $insAsPerAsfAOrB = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_Driver_name')]
    private ?string $tpDriverName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_Address_1')]
    private ?string $tpAddress1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_Address_2')]
    private ?string $tpAddress2 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_Email')]
    private ?string $tpEmail = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_Contact_No')]
    private ?string $tpContactNo = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_Make_Model')]
    private ?string $tpMakeModel = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_Leasing')]
    private ?string $tpLeasing = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'TP_As_per_ASF_A_or_B')]
    private ?string $tpAsPerAsfAOrB = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'DoA')]
    private ?\DateTimeInterface $doa = null;

    #[ORM\Column(type: 'time', nullable: true, name: 'ToA')]
    private ?\DateTimeInterface $toa = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'PoA')]
    private ?string $poa = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Same_as_Insured')]
    private ?string $sameAsInsured = null;

    // Getters and Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCol1(): ?string
    {
        return $this->col1;
    }

    public function setCol1(?string $col1): self
    {
        $this->col1 = $col1;
        return $this;
    }

    public function getCol2(): ?string
    {
        return $this->col2;
    }

    public function setCol2(?string $col2): self
    {
        $this->col2 = $col2;
        return $this;
    }

    public function getCol3(): ?string
    {
        return $this->col3;
    }

    public function setCol3(?string $col3): self
    {
        $this->col3 = $col3;
        return $this;
    }

    public function getAccMonth(): ?string
    {
        return $this->accMonth;
    }

    public function setAccMonth(?string $accMonth): self
    {
        $this->accMonth = $accMonth;
        return $this;
    }

    public function getAccYear(): ?string
    {
        return $this->accYear;
    }

    public function setAccYear(?string $accYear): self
    {
        $this->accYear = $accYear;
        return $this;
    }

    public function getClaimNo(): ?string
    {
        return $this->claimNo;
    }

    public function setClaimNo(?string $claimNo): self
    {
        $this->claimNo = $claimNo;
        return $this;
    }

    public function getDateOfAccident(): ?\DateTimeInterface
    {
        return $this->dateOfAccident;
    }

    public function setDateOfAccident(?\DateTimeInterface $dateOfAccident): self
    {
        $this->dateOfAccident = $dateOfAccident;
        return $this;
    }

    public function getCrmClientRef(): ?string
    {
        return $this->crmClientRef;
    }

    public function setCrmClientRef(?string $crmClientRef): self
    {
        $this->crmClientRef = $crmClientRef;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;
        return $this;
    }

    public function getForename(): ?string
    {
        return $this->forename;
    }

    public function setForename(?string $forename): self
    {
        $this->forename = $forename;
        return $this;
    }

    public function getInsVehNo(): ?string
    {
        return $this->insVehNo;
    }

    public function setInsVehNo(?string $insVehNo): self
    {
        $this->insVehNo = $insVehNo;
        return $this;
    }

    public function getInsVehMake(): ?string
    {
        return $this->insVehMake;
    }

    public function setInsVehMake(?string $insVehMake): self
    {
        $this->insVehMake = $insVehMake;
        return $this;
    }

    public function getInsLiability(): ?string
    {
        return $this->insLiability;
    }

    public function setInsLiability(?string $insLiability): self
    {
        $this->insLiability = $insLiability;
        return $this;
    }

    public function getInsGarage(): ?string
    {
        return $this->insGarage;
    }

    public function setInsGarage(?string $insGarage): self
    {
        $this->insGarage = $insGarage;
        return $this;
    }

    public function getInsSurveyor1(): ?string
    {
        return $this->insSurveyor1;
    }

    public function setInsSurveyor1(?string $insSurveyor1): self
    {
        $this->insSurveyor1 = $insSurveyor1;
        return $this;
    }

    public function getInsSurveyor2(): ?string
    {
        return $this->insSurveyor2;
    }

    public function setInsSurveyor2(?string $insSurveyor2): self
    {
        $this->insSurveyor2 = $insSurveyor2;
        return $this;
    }

    public function getInsCarRental(): ?string
    {
        return $this->insCarRental;
    }

    public function setInsCarRental(?string $insCarRental): self
    {
        $this->insCarRental = $insCarRental;
        return $this;
    }

    public function getTpVehNo(): ?string
    {
        return $this->tpVehNo;
    }

    public function setTpVehNo(?string $tpVehNo): self
    {
        $this->tpVehNo = $tpVehNo;
        return $this;
    }

    public function getTpTitle(): ?string
    {
        return $this->tpTitle;
    }

    public function setTpTitle(?string $tpTitle): self
    {
        $this->tpTitle = $tpTitle;
        return $this;
    }

    public function getTpName(): ?string
    {
        return $this->tpName;
    }

    public function setTpName(?string $tpName): self
    {
        $this->tpName = $tpName;
        return $this;
    }

    public function getTpForname(): ?string
    {
        return $this->tpForname;
    }

    public function setTpForname(?string $tpForname): self
    {
        $this->tpForname = $tpForname;
        return $this;
    }

    public function getTpInsurance(): ?string
    {
        return $this->tpInsurance;
    }

    public function setTpInsurance(?string $tpInsurance): self
    {
        $this->tpInsurance = $tpInsurance;
        return $this;
    }

    public function getTpLiability(): ?string
    {
        return $this->tpLiability;
    }

    public function setTpLiability(?string $tpLiability): self
    {
        $this->tpLiability = $tpLiability;
        return $this;
    }

    public function getTpGarage(): ?string
    {
        return $this->tpGarage;
    }

    public function setTpGarage(?string $tpGarage): self
    {
        $this->tpGarage = $tpGarage;
        return $this;
    }

    public function getTpSurveyor1(): ?string
    {
        return $this->tpSurveyor1;
    }

    public function setTpSurveyor1(?string $tpSurveyor1): self
    {
        $this->tpSurveyor1 = $tpSurveyor1;
        return $this;
    }

    public function getTpSurveyor2(): ?string
    {
        return $this->tpSurveyor2;
    }

    public function setTpSurveyor2(?string $tpSurveyor2): self
    {
        $this->tpSurveyor2 = $tpSurveyor2;
        return $this;
    }

    public function getTpCarRental(): ?string
    {
        return $this->tpCarRental;
    }

    public function setTpCarRental(?string $tpCarRental): self
    {
        $this->tpCarRental = $tpCarRental;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCaseStageReached(): ?string
    {
        return $this->caseStageReached;
    }

    public function setCaseStageReached(?string $caseStageReached): self
    {
        $this->caseStageReached = $caseStageReached;
        return $this;
    }

    public function getClaimCount(): ?int
    {
        return $this->claimCount;
    }

    public function setClaimCount(?int $claimCount): self
    {
        $this->claimCount = $claimCount;
        return $this;
    }

    public function getTpNumber(): ?string
    {
        return $this->tpNumber;
    }

    public function setTpNumber(?string $tpNumber): self
    {
        $this->tpNumber = $tpNumber;
        return $this;
    }

    public function getInsDriverName(): ?string
    {
        return $this->insDriverName;
    }

    public function setInsDriverName(?string $insDriverName): self
    {
        $this->insDriverName = $insDriverName;
        return $this;
    }

    public function getInsDriverAddress1(): ?string
    {
        return $this->insDriverAddress1;
    }

    public function setInsDriverAddress1(?string $insDriverAddress1): self
    {
        $this->insDriverAddress1 = $insDriverAddress1;
        return $this;
    }

    public function getInsDriverAddress2(): ?string
    {
        return $this->insDriverAddress2;
    }

    public function setInsDriverAddress2(?string $insDriverAddress2): self
    {
        $this->insDriverAddress2 = $insDriverAddress2;
        return $this;
    }

    public function getInsDriverAge(): ?int
    {
        return $this->insDriverAge;
    }

    public function setInsDriverAge(?int $insDriverAge): self
    {
        $this->insDriverAge = $insDriverAge;
        return $this;
    }

    public function getInsDriverExp(): ?string
    {
        return $this->insDriverExp;
    }

    public function setInsDriverExp(?string $insDriverExp): self
    {
        $this->insDriverExp = $insDriverExp;
        return $this;
    }

    public function getInsDriverEmail(): ?string
    {
        return $this->insDriverEmail;
    }

    public function setInsDriverEmail(?string $insDriverEmail): self
    {
        $this->insDriverEmail = $insDriverEmail;
        return $this;
    }

    public function getInsPolicyNo(): ?string
    {
        return $this->insPolicyNo;
    }

    public function setInsPolicyNo(?string $insPolicyNo): self
    {
        $this->insPolicyNo = $insPolicyNo;
        return $this;
    }

    public function getInsPeriodOfInsFrom(): ?\DateTimeInterface
    {
        return $this->insPeriodOfInsFrom;
    }

    public function setInsPeriodOfInsFrom(?\DateTimeInterface $insPeriodOfInsFrom): self
    {
        $this->insPeriodOfInsFrom = $insPeriodOfInsFrom;
        return $this;
    }

    public function getInsPeriodOfInsTo(): ?\DateTimeInterface
    {
        return $this->insPeriodOfInsTo;
    }

    public function setInsPeriodOfInsTo(?\DateTimeInterface $insPeriodOfInsTo): self
    {
        $this->insPeriodOfInsTo = $insPeriodOfInsTo;
        return $this;
    }

    public function getSumInsured(): ?float
    {
        return $this->sumInsured;
    }

    public function setSumInsured(?float $sumInsured): self
    {
        $this->sumInsured = $sumInsured;
        return $this;
    }

    public function getInsAccessories(): ?string
    {
        return $this->insAccessories;
    }

    public function setInsAccessories(?string $insAccessories): self
    {
        $this->insAccessories = $insAccessories;
        return $this;
    }

    public function getInsAccessoriesRs(): ?float
    {
        return $this->insAccessoriesRs;
    }

    public function setInsAccessoriesRs(?float $insAccessoriesRs): self
    {
        $this->insAccessoriesRs = $insAccessoriesRs;
        return $this;
    }

    public function getInsYear(): ?string
    {
        return $this->insYear;
    }

    public function setInsYear(?string $insYear): self
    {
        $this->insYear = $insYear;
        return $this;
    }

    public function getInsLeasing(): ?string
    {
        return $this->insLeasing;
    }

    public function setInsLeasing(?string $insLeasing): self
    {
        $this->insLeasing = $insLeasing;
        return $this;
    }

    public function getInsEngineRating(): ?string
    {
        return $this->insEngineRating;
    }

    public function setInsEngineRating(?string $insEngineRating): self
    {
        $this->insEngineRating = $insEngineRating;
        return $this;
    }

    public function getInsCompExcess(): ?float
    {
        return $this->insCompExcess;
    }

    public function setInsCompExcess(?float $insCompExcess): self
    {
        $this->insCompExcess = $insCompExcess;
        return $this;
    }

    public function getInsVolExcess(): ?float
    {
        return $this->insVolExcess;
    }

    public function setInsVolExcess(?float $insVolExcess): self
    {
        $this->insVolExcess = $insVolExcess;
        return $this;
    }

    public function getInsSpecialTerms6(): ?string
    {
        return $this->insSpecialTerms6;
    }

    public function setInsSpecialTerms6(?string $insSpecialTerms6): self
    {
        $this->insSpecialTerms6 = $insSpecialTerms6;
        return $this;
    }

    public function getInsCertType(): ?string
    {
        return $this->insCertType;
    }

    public function setInsCertType(?string $insCertType): self
    {
        $this->insCertType = $insCertType;
        return $this;
    }

    public function getInsCertNo(): ?string
    {
        return $this->insCertNo;
    }

    public function setInsCertNo(?string $insCertNo): self
    {
        $this->insCertNo = $insCertNo;
        return $this;
    }

    public function getInsInclRegFees(): ?string
    {
        return $this->insInclRegFees;
    }

    public function setInsInclRegFees(?string $insInclRegFees): self
    {
        $this->insInclRegFees = $insInclRegFees;
        return $this;
    }

    public function getInsExcessWaiver(): ?string
    {
        return $this->insExcessWaiver;
    }

    public function setInsExcessWaiver(?string $insExcessWaiver): self
    {
        $this->insExcessWaiver = $insExcessWaiver;
        return $this;
    }

    public function getInsRodent(): ?string
    {
        return $this->insRodent;
    }

    public function setInsRodent(?string $insRodent): self
    {
        $this->insRodent = $insRodent;
        return $this;
    }

    public function getInsLou(): ?string
    {
        return $this->insLou;
    }

    public function setInsLou(?string $insLou): self
    {
        $this->insLou = $insLou;
        return $this;
    }

    public function getInsNoOfDays(): ?int
    {
        return $this->insNoOfDays;
    }

    public function setInsNoOfDays(?int $insNoOfDays): self
    {
        $this->insNoOfDays = $insNoOfDays;
        return $this;
    }

    public function getInsLimitLou(): ?float
    {
        return $this->insLimitLou;
    }

    public function setInsLimitLou(?float $insLimitLou): self
    {
        $this->insLimitLou = $insLimitLou;
        return $this;
    }

    public function getInsAsPerAsfAOrB(): ?string
    {
        return $this->insAsPerAsfAOrB;
    }

    public function setInsAsPerAsfAOrB(?string $insAsPerAsfAOrB): self
    {
        $this->insAsPerAsfAOrB = $insAsPerAsfAOrB;
        return $this;
    }

    public function getTpDriverName(): ?string
    {
        return $this->tpDriverName;
    }

    public function setTpDriverName(?string $tpDriverName): self
    {
        $this->tpDriverName = $tpDriverName;
        return $this;
    }

    public function getTpAddress1(): ?string
    {
        return $this->tpAddress1;
    }

    public function setTpAddress1(?string $tpAddress1): self
    {
        $this->tpAddress1 = $tpAddress1;
        return $this;
    }

    public function getTpAddress2(): ?string
    {
        return $this->tpAddress2;
    }

    public function setTpAddress2(?string $tpAddress2): self
    {
        $this->tpAddress2 = $tpAddress2;
        return $this;
    }

    public function getTpEmail(): ?string
    {
        return $this->tpEmail;
    }

    public function setTpEmail(?string $tpEmail): self
    {
        $this->tpEmail = $tpEmail;
        return $this;
    }

    public function getTpContactNo(): ?string
    {
        return $this->tpContactNo;
    }

    public function setTpContactNo(?string $tpContactNo): self
    {
        $this->tpContactNo = $tpContactNo;
        return $this;
    }

    public function getTpMakeModel(): ?string
    {
        return $this->tpMakeModel;
    }

    public function setTpMakeModel(?string $tpMakeModel): self
    {
        $this->tpMakeModel = $tpMakeModel;
        return $this;
    }

    public function getTpLeasing(): ?string
    {
        return $this->tpLeasing;
    }

    public function setTpLeasing(?string $tpLeasing): self
    {
        $this->tpLeasing = $tpLeasing;
        return $this;
    }

    public function getTpAsPerAsfAOrB(): ?string
    {
        return $this->tpAsPerAsfAOrB;
    }

    public function setTpAsPerAsfAOrB(?string $tpAsPerAsfAOrB): self
    {
        $this->tpAsPerAsfAOrB = $tpAsPerAsfAOrB;
        return $this;
    }

    public function getDoa(): ?\DateTimeInterface
    {
        return $this->doa;
    }

    public function setDoa(?\DateTimeInterface $doa): self
    {
        $this->doa = $doa;
        return $this;
    }

    public function getToa(): ?\DateTimeInterface
    {
        return $this->toa;
    }

    public function setToa(?\DateTimeInterface $toa): self
    {
        $this->toa = $toa;
        return $this;
    }

    public function getPoa(): ?string
    {
        return $this->poa;
    }

    public function setPoa(?string $poa): self
    {
        $this->poa = $poa;
        return $this;
    }

    public function getSameAsInsured(): ?string
    {
        return $this->sameAsInsured;
    }

    public function setSameAsInsured(?string $sameAsInsured): self
    {
        $this->sameAsInsured = $sameAsInsured;
        return $this;
    }
}