<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'claims')]
class Claims
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Clients::class, inversedBy: 'claims')]
    #[ORM\JoinColumn(name: 'CRMClientRef', referencedColumnName: 'crmClientRef', nullable: false, onDelete: 'CASCADE')]
    private ?Clients $client = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $col1 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $col2 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $col3 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $accMonth = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $claimNo = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $dateOfAccident = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $title = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $surname = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $forename = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insVehNo = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insVehMake = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insLiability = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insGarage = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insSurveyor1 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insSurveyor2 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insCarRental = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpVehNo = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpTitle = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpName = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpForname = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpInsurance = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpLiability = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpGarage = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpSurveyor1 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpSurveyor2 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpCarRental = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $status = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $caseStageReached = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $claimCount = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpNumber = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insDriverName = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insDriverAddress1 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insDriverAddress2 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insDriverAge = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insDriverExp = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insDriverEmail = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insPolicyNo = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insPeriodOfInsFrom = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insPeriodOfInsTo = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $sumInsured = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insAccessories = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insAccessoriesRs = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insYear = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insLeasing = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insEngineRating = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insCompExcess = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insVolExcess = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insSpecialTerms6 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insCertType = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insCertNo = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insInopianFees = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insExcessWaiver = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insRodent = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insLou = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insNoOfDays = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insLimitLou = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $insAsPerAsfAOrB = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpDriverName = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpAddress1 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpAddress2 = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpEmail = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpContactNo = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpMakeModel = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpLeasing = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $tpAsPerAsfAOrB = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $doa = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $toa = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $poa = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $sameAsInsured = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;
        return $this;
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

    public function getClaimNo(): ?string
    {
        return $this->claimNo;
    }

    public function setClaimNo(?string $claimNo): self
    {
        $this->claimNo = $claimNo;
        return $this;
    }

    public function getDateOfAccident(): ?float
    {
        return $this->dateOfAccident;
    }

    public function setDateOfAccident(?float $dateOfAccident): self
    {
        $this->dateOfAccident = $dateOfAccident;
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

    public function getClaimCount(): ?float
    {
        return $this->claimCount;
    }

    public function setClaimCount(?float $claimCount): self
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

    public function getInsDriverAge(): ?string
    {
        return $this->insDriverAge;
    }

    public function setInsDriverAge(?string $insDriverAge): self
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

    public function getInsPeriodOfInsFrom(): ?string
    {
        return $this->insPeriodOfInsFrom;
    }

    public function setInsPeriodOfInsFrom(?string $insPeriodOfInsFrom): self
    {
        $this->insPeriodOfInsFrom = $insPeriodOfInsFrom;
        return $this;
    }

    public function getInsPeriodOfInsTo(): ?string
    {
        return $this->insPeriodOfInsTo;
    }

    public function setInsPeriodOfInsTo(?string $insPeriodOfInsTo): self
    {
        $this->insPeriodOfInsTo = $insPeriodOfInsTo;
        return $this;
    }

    public function getSumInsured(): ?string
    {
        return $this->sumInsured;
    }

    public function setSumInsured(?string $sumInsured): self
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

    public function getInsAccessoriesRs(): ?string
    {
        return $this->insAccessoriesRs;
    }

    public function setInsAccessoriesRs(?string $insAccessoriesRs): self
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

    public function getInsCompExcess(): ?string
    {
        return $this->insCompExcess;
    }

    public function setInsCompExcess(?string $insCompExcess): self
    {
        $this->insCompExcess = $insCompExcess;
        return $this;
    }

    public function getInsVolExcess(): ?string
    {
        return $this->insVolExcess;
    }

    public function setInsVolExcess(?string $insVolExcess): self
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

    public function getInsInopianFees(): ?string
    {
        return $this->insInopianFees;
    }

    public function setInsInopianFees(?string $insInopianFees): self
    {
        $this->insInopianFees = $insInopianFees;
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

    public function getInsNoOfDays(): ?string
    {
        return $this->insNoOfDays;
    }

    public function setInsNoOfDays(?string $insNoOfDays): self
    {
        $this->insNoOfDays = $insNoOfDays;
        return $this;
    }

    public function getInsLimitLou(): ?string
    {
        return $this->insLimitLou;
    }

    public function setInsLimitLou(?string $insLimitLou): self
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

    public function getDoa(): ?string
    {
        return $this->doa;
    }

    public function setDoa(?string $doa): self
    {
        $this->doa = $doa;
        return $this;
    }

    public function getToa(): ?string
    {
        return $this->toa;
    }

    public function setToa(?string $toa): self
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