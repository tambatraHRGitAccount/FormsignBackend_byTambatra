<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class PoliciesDto
{
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('POLICY')]
    public ?string $policy = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('QB_INV_NUM')]
    public ?string $qbInvNum = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('SwanClientRef')]
    public ?string $swanClientRef = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('FULLNAME')]
    public ?string $fullName = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'DATE_FROM must be in YYYY-MM-DD format')]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('DATE_FROM')]
    public ?string $dateFrom = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'DATE_TO must be in YYYY-MM-DD format')]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('DATE_TO')]
    public ?string $dateTo = null;

    #[Assert\PositiveOrZero]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('PREMIUM')]
    public ?float $premium = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('CASH_CREDIT_TRANSAC')]
    public ?string $cashCreditTransac = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('REGISTRATION_NUMBER')]
    public ?string $registrationNumber = null;

    #[Assert\PositiveOrZero]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('SUM_INSURED')]
    public ?float $sumInsured = null;

    #[Assert\PositiveOrZero]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('GROSS_PREMIUM')]
    public ?float $grossPremium = null;

    #[Assert\PositiveOrZero]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('RATE')]
    public ?float $rate = null;

    #[Assert\PositiveOrZero]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('EXCESS')]
    public ?float $excess = null;

    #[Assert\PositiveOrZero]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('NET_PREMIUM')]
    public ?float $netPremium = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('ACC_MONTH')]
    public ?string $accMonth = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('ACC_YEAR')]
    public ?string $accYear = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('PLACING_NUMBER')]
    public ?string $placingNumber = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $crmClientRef = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Transact')]
    public ?string $transact = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('motor_certificate')]
    public ?string $motorCertificate = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('make_model')]
    public ?string $makeModel = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('year')]
    public ?string $year = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('month')]
    public ?string $month = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('hp')]
    public ?string $hp = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('body_type')]
    public ?string $bodyType = null;

    #[Assert\PositiveOrZero]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('DAYS_LOU')]
    public ?int $daysLou = null;

    #[Assert\PositiveOrZero]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('LIMIT_LOU')]
    public ?float $limitLou = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('AIC')]
    public ?string $aic = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('NAFEW')]
    public ?string $nafew = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('type_of_insurance')]
    public ?string $typeOfInsurance = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('type_of_cover')]
    public ?string $typeOfCover = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('make')]
    public ?string $make = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('model')]
    public ?string $model = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Introducer')]
    public ?string $introducer = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Leasing')]
    public ?string $leasing = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Lien')]
    public ?string $lien = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'TRASAC_DATE must be in YYYY-MM-DD format')]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('TRASAC_DATE')]
    public ?string $trasacDate = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Field37')]
    public ?string $field37 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Field38')]
    public ?string $field38 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Field39')]
    public ?string $field39 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Field40')]
    public ?string $field40 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Field41')]
    public ?string $field41 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Field42')]
    public ?string $field42 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Field43')]
    public ?string $field43 = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('QB_Client_Name')]
    public ?string $qbClientName = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Exported_to_QB')]
    public ?string $exportedToQb = null;

    #[Assert\Length(max: 255)]
    #[Groups(['policies:read', 'policies:write'])]
    #[SerializedName('Sent_to_Swan')]
    public ?string $sentToSwan = null;
}