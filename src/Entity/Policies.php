<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\Operation;
use App\Dto\PoliciesDto;
use App\Dto\LastPolicyNumbersDto;
use App\State\PoliciesProcessor;
use App\State\LastPolicyNumbersProvider;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'policies')]
#[ApiResource(
    operations: [
        new Get(
            output: PoliciesDto::class
        ),
        new GetCollection(
            output: PoliciesDto::class
        ),
        new Post(
            input: PoliciesDto::class,
            output: PoliciesDto::class,
            processor: PoliciesProcessor::class
        ),
        new Put(
            input: PoliciesDto::class,
            output: PoliciesDto::class,
            processor: PoliciesProcessor::class
        ),
        new Delete(
            processor: PoliciesProcessor::class
        ),
        new Get(
            uriTemplate: '/last-policy-numbers',
            output: LastPolicyNumbersDto::class,
            provider: LastPolicyNumbersProvider::class,
            openapi: new \ApiPlatform\OpenApi\Model\Operation(
                summary: 'Récupère les derniers numéros de placement et de facture QB',
                description: 'Retourne les derniers PLACING_NUMBER et QB_INV_NUM de la table policies.'
            )
        ),
    ],
    normalizationContext: ['groups' => ['policies:read', 'last_policy_numbers:read']],
    denormalizationContext: ['groups' => ['policies:write']]
)]
class Policies
{
    private ?string $polser = null;
    #[ORM\Id]
    #[ORM\Column(type: 'bigint')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, unique: true, name: 'POLICY')]
    private ?string $policy = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'QB_INV_NUM')]
    private ?string $qbInvNum = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'SwanClientRef')]
    private ?string $swanClientRef = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'FULLNAME')]
    private ?string $fullName = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'DATE_FROM')]
    private ?\DateTimeInterface $dateFrom = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'DATE_TO')]
    private ?\DateTimeInterface $dateTo = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'PREMIUM')]
    private ?float $premium = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CASH_CREDIT_TRANSAC')]
    private ?string $cashCreditTransac = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'REGISTRATION_NUMBER')]
    private ?string $registrationNumber = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'SUM_INSURED')]
    private ?float $sumInsured = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'GROSS_PREMIUM')]
    private ?float $grossPremium = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true, name: 'RATE')]
    private ?float $rate = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'EXCESS')]
    private ?float $excess = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'NET_PREMIUM')]
    private ?float $netPremium = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'ACC_MONTH')]
    private ?string $accMonth = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'ACC_YEAR')]
    private ?string $accYear = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'PLACING_NUMBER')]
    private ?string $placingNumber = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'CRMClientRef')]
    private ?string $crmClientRef = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Transact')]
    private ?string $transact = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'motor_certificate')]
    private ?string $motorCertificate = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'make_model')]
    private ?string $makeModel = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'year')]
    private ?string $year = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'month')]
    private ?string $month = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'hp')]
    private ?string $hp = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'body_type')]
    private ?string $bodyType = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'DAYS_LOU')]
    private ?int $daysLou = null;

    #[ORM\Column(type: 'decimal', precision: 15, scale: 2, nullable: true, name: 'LIMIT_LOU')]
    private ?float $limitLou = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'AIC')]
    private ?string $aic = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'NAFEW')]
    private ?string $nafew = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'type_of_insurance')]
    private ?string $typeOfInsurance = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'type_of_cover')]
    private ?string $typeOfCover = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'make')]
    private ?string $make = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'model')]
    private ?string $model = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Introducer')]
    private ?string $introducer = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Leasing')]
    private ?string $leasing = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Lien')]
    private ?string $lien = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'TRASAC_DATE')]
    private ?\DateTimeInterface $trasacDate = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Field37')]
    private ?string $field37 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Field38')]
    private ?string $field38 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Field39')]
    private ?string $field39 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Field40')]
    private ?string $field40 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Field41')]
    private ?string $field41 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Field42')]
    private ?string $field42 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Field43')]
    private ?string $field43 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'QB_Client_Name')]
    private ?string $qbClientName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Exported_to_QB')]
    private ?string $exportedToQb = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Sent_to_Swan')]
    private ?string $sentToSwan = null;

    // Getters and Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPolicy(): ?string
    {
        return $this->policy;
    }

    public function setPolicy(?string $policy): self
    {
        $this->policy = $policy;
        $this->polser = is_object($policy) && method_exists($policy, 'getPolicy') ? $policy->getPolicy() : null;
        return $this;
    }

    public function getQbInvNum(): ?string
    {
        return $this->qbInvNum;
    }

    public function setQbInvNum(?string $qbInvNum): self
    {
        $this->qbInvNum = $qbInvNum;
        return $this;
    }

    public function getSwanClientRef(): ?string
    {
        return $this->swanClientRef;
    }

    public function setSwanClientRef(?string $swanClientRef): self
    {
        $this->swanClientRef = $swanClientRef;
        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;
        return $this;
    }

    public function getDateFrom(): ?\DateTimeInterface
    {
        return $this->dateFrom;
    }

    public function setDateFrom(?\DateTimeInterface $dateFrom): self
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    public function getDateTo(): ?\DateTimeInterface
    {
        return $this->dateTo;
    }

    public function setDateTo(?\DateTimeInterface $dateTo): self
    {
        $this->dateTo = $dateTo;
        return $this;
    }

    public function getPremium(): ?float
    {
        return $this->premium;
    }

    public function setPremium(?float $premium): self
    {
        $this->premium = $premium;
        return $this;
    }

    public function getCashCreditTransac(): ?string
    {
        return $this->cashCreditTransac;
    }

    public function setCashCreditTransac(?string $cashCreditTransac): self
    {
        $this->cashCreditTransac = $cashCreditTransac;
        return $this;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(?string $registrationNumber): self
    {
        $this->registrationNumber = $registrationNumber;
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

    public function getGrossPremium(): ?float
    {
        return $this->grossPremium;
    }

    public function setGrossPremium(?float $grossPremium): self
    {
        $this->grossPremium = $grossPremium;
        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(?float $rate): self
    {
        $this->rate = $rate;
        return $this;
    }

    public function getExcess(): ?float
    {
        return $this->excess;
    }

    public function setExcess(?float $excess): self
    {
        $this->excess = $excess;
        return $this;
    }

    public function getNetPremium(): ?float
    {
        return $this->netPremium;
    }

    public function setNetPremium(?float $netPremium): self
    {
        $this->netPremium = $netPremium;
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

    public function getPlacingNumber(): ?string
    {
        return $this->placingNumber;
    }

    public function setPlacingNumber(?string $placingNumber): self
    {
        $this->placingNumber = $placingNumber;
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

    public function getTransact(): ?string
    {
        return $this->transact;
    }

    public function setTransact(?string $transact): self
    {
        $this->transact = $transact;
        return $this;
    }

    public function getMotorCertificate(): ?string
    {
        return $this->motorCertificate;
    }

    public function setMotorCertificate(?string $motorCertificate): self
    {
        $this->motorCertificate = $motorCertificate;
        return $this;
    }

    public function getMakeModel(): ?string
    {
        return $this->makeModel;
    }

    public function setMakeModel(?string $makeModel): self
    {
        $this->makeModel = $makeModel;
        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;
        return $this;
    }

    public function getMonth(): ?string
    {
        return $this->month;
    }

    public function setMonth(?string $month): self
    {
        $this->month = $month;
        return $this;
    }

    public function getHp(): ?string
    {
        return $this->hp;
    }

    public function setHp(?string $hp): self
    {
        $this->hp = $hp;
        return $this;
    }

    public function getBodyType(): ?string
    {
        return $this->bodyType;
    }

    public function setBodyType(?string $bodyType): self
    {
        $this->bodyType = $bodyType;
        return $this;
    }

    public function getDaysLou(): ?int
    {
        return $this->daysLou;
    }

    public function setDaysLou(?int $daysLou): self
    {
        $this->daysLou = $daysLou;
        return $this;
    }

    public function getLimitLou(): ?float
    {
        return $this->limitLou;
    }

    public function setLimitLou(?float $limitLou): self
    {
        $this->limitLou = $limitLou;
        return $this;
    }

    public function getAic(): ?string
    {
        return $this->aic;
    }

    public function setAic(?string $aic): self
    {
        $this->aic = $aic;
        return $this;
    }

    public function getNafew(): ?string
    {
        return $this->nafew;
    }

    public function setNafew(?string $nafew): self
    {
        $this->nafew = $nafew;
        return $this;
    }

    public function getTypeOfInsurance(): ?string
    {
        return $this->typeOfInsurance;
    }

    public function setTypeOfInsurance(?string $typeOfInsurance): self
    {
        $this->typeOfInsurance = $typeOfInsurance;
        return $this;
    }

    public function getTypeOfCover(): ?string
    {
        return $this->typeOfCover;
    }

    public function setTypeOfCover(?string $typeOfCover): self
    {
        $this->typeOfCover = $typeOfCover;
        return $this;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(?string $make): self
    {
        $this->make = $make;
        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function getIntroducer(): ?string
    {
        return $this->introducer;
    }

    public function setIntroducer(?string $introducer): self
    {
        $this->introducer = $introducer;
        return $this;
    }

    public function getLeasing(): ?string
    {
        return $this->leasing;
    }

    public function setLeasing(?string $leasing): self
    {
        $this->leasing = $leasing;
        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;
        return $this;
    }

    public function getTrasacDate(): ?\DateTimeInterface
    {
        return $this->trasacDate;
    }

    public function setTrasacDate(?\DateTimeInterface $trasacDate): self
    {
        $this->trasacDate = $trasacDate;
        return $this;
    }

    public function getField37(): ?string
    {
        return $this->field37;
    }

    public function setField37(?string $field37): self
    {
        $this->field37 = $field37;
        return $this;
    }

    public function getField38(): ?string
    {
        return $this->field38;
    }

    public function setField38(?string $field38): self
    {
        $this->field38 = $field38;
        return $this;
    }

    public function getField39(): ?string
    {
        return $this->field39;
    }

    public function setField39(?string $field39): self
    {
        $this->field39 = $field39;
        return $this;
    }

    public function getField40(): ?string
    {
        return $this->field40;
    }

    public function setField40(?string $field40): self
    {
        $this->field40 = $field40;
        return $this;
    }

    public function getField41(): ?string
    {
        return $this->field41;
    }

    public function setField41(?string $field41): self
    {
        $this->field41 = $field41;
        return $this;
    }

    public function getField42(): ?string
    {
        return $this->field42;
    }

    public function setField42(?string $field42): self
    {
        $this->field42 = $field42;
        return $this;
    }

    public function getField43(): ?string
    {
        return $this->field43;
    }

    public function setField43(?string $field43): self
    {
        $this->field43 = $field43;
        return $this;
    }

    public function getQbClientName(): ?string
    {
        return $this->qbClientName;
    }

    public function setQbClientName(?string $qbClientName): self
    {
        $this->qbClientName = $qbClientName;
        return $this;
    }

    public function getExportedToQb(): ?string
    {
        return $this->exportedToQb;
    }

    public function setExportedToQb(?string $exportedToQb): self
    {
        $this->exportedToQb = $exportedToQb;
        return $this;
    }

    public function getSentToSwan(): ?string
    {
        return $this->sentToSwan;
    }

    public function setSentToSwan(?string $sentToSwan): self
    {
        $this->sentToSwan = $sentToSwan;
        return $this;
    }
}