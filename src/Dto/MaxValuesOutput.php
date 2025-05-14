<?php
namespace App\Dto;

class MaxValuesOutput
{
    public string $maxQbInvNum;
    public string $maxPlacingNumber;

    public function __construct(string $maxQbInvNum, string $maxPlacingNumber)
    {
        $this->maxQbInvNum = $maxQbInvNum;
        $this->maxPlacingNumber = $maxPlacingNumber;
    }
}