<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class LastPolicyNumbersDto
{
    #[Assert\Length(max: 255)]
    #[Groups(['last_policy_numbers:read'])]
    #[SerializedName('PLACING_NUMBER')]
    public ?string $placingNumber = null;

    #[Assert\Length(max: 255)]
    #[Groups(['last_policy_numbers:read'])]
    #[SerializedName('QB_INV_NUM')]
    public ?string $qbInvNum = null;
}