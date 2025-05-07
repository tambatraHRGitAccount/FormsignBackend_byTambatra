<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Policies;
use App\State\PoliciesSearchProvider;

#[GetCollection(
    provider: PoliciesSearchProvider::class,
    uriTemplate: '/policies-search',
)]
#[QueryParameter(key: 'policy')]
#[QueryParameter(key: 'qbInvNum')]
#[QueryParameter(key: 'swanClientRef')]
#[QueryParameter(key: 'fullName')]
#[QueryParameter(key: 'dateFrom')]
#[QueryParameter(key: 'dateTo')]
#[QueryParameter(key: 'premium')]
#[QueryParameter(key: 'cashCreditTransac')]
#[QueryParameter(key: 'registrationNumber')]
#[QueryParameter(key: 'crmClientRef')]
class PoliciesSearch
{
    public function __construct(
        public ?int $id = null,
        public ?string $policy = null,
        public ?string $qbInvNum = null,
        public ?string $swanClientRef = null,
        public ?string $fullName = null,
        public ?\DateTimeInterface $dateFrom = null,
        public ?\DateTimeInterface $dateTo = null,
        public ?float $premium = null,
        public ?string $cashCreditTransac = null,
        public ?string $registrationNumber = null,
        public ?float $sumInsured = null,
        public ?float $grossPremium = null,
        public ?float $rate = null,
        public ?float $excess = null,
        public ?float $netPremium = null,
        public ?string $accMonth = null,
        public ?string $accYear = null,
        public ?string $placingNumber = null,
        public ?string $crmClientRef = null,
        public ?string $transact = null,
        public ?string $motorCertificate = null,
        public ?string $makeModel = null,
        public ?string $year = null,
        public ?string $month = null,
        public ?string $hp = null,
        public ?string $bodyType = null,
        public ?int $daysLou = null,
        public ?float $limitLou = null,
        public ?string $aic = null,
        public ?string $nafew = null,
        public ?string $typeOfInsurance = null,
        public ?string $typeOfCover = null,
        public ?string $make = null,
        public ?string $model = null,
        public ?string $introducer = null,
        public ?string $leasing = null,
        public ?string $lien = null,
        public ?\DateTimeInterface $trasacDate = null,
        public ?string $field37 = null,
        public ?string $field38 = null,
        public ?string $field39 = null,
        public ?string $field40 = null,
        public ?string $field41 = null,
        public ?string $field42 = null,
        public ?string $field43 = null,
        public ?string $qbClientName = null,
        public ?string $exportedToQb = null,
        public ?string $sentToSwan = null
    ) {
    }

    public static function mapFromPolicies(Policies $policies): PoliciesSearch
    {
        return new PoliciesSearch(
            id: $policies->getId(),
            policy: $policies->getPolicy(),
            qbInvNum: $policies->getQbInvNum(),
            swanClientRef: $policies->getSwanClientRef(),
            fullName: $policies->getFullName(),
            dateFrom: $policies->getDateFrom(),
            dateTo: $policies->getDateTo(),
            premium: $policies->getPremium(),
            cashCreditTransac: $policies->getCashCreditTransac(),
            registrationNumber: $policies->getRegistrationNumber(),
            sumInsured: $policies->getSumInsured(),
            grossPremium: $policies->getGrossPremium(),
            rate: $policies->getRate(),
            excess: $policies->getExcess(),
            netPremium: $policies->getNetPremium(),
            accMonth: $policies->getAccMonth(),
            accYear: $policies->getAccYear(),
            placingNumber: $policies->getPlacingNumber(),
            crmClientRef: $policies->getCrmClientRef(),
            transact: $policies->getTransact(),
            motorCertificate: $policies->getMotorCertificate(),
            makeModel: $policies->getMakeModel(),
            year: $policies->getYear(),
            month: $policies->getMonth(),
            hp: $policies->getHp(),
            bodyType: $policies->getBodyType(),
            daysLou: $policies->getDaysLou(),
            limitLou: $policies->getLimitLou(),
            aic: $policies->getAic(),
            nafew: $policies->getNafew(),
            typeOfInsurance: $policies->getTypeOfInsurance(),
            typeOfCover: $policies->getTypeOfCover(),
            make: $policies->getMake(),
            model: $policies->getModel(),
            introducer: $policies->getIntroducer(),
            leasing: $policies->getLeasing(),
            lien: $policies->getLien(),
            trasacDate: $policies->getTrasacDate(),
            field37: $policies->getField37(),
            field38: $policies->getField38(),
            field39: $policies->getField39(),
            field40: $policies->getField40(),
            field41: $policies->getField41(),
            field42: $policies->getField42(),
            field43: $policies->getField43(),
            qbClientName: $policies->getQbClientName(),
            exportedToQb: $policies->getExportedToQb(),
            sentToSwan: $policies->getSentToSwan()
        );
    }
}