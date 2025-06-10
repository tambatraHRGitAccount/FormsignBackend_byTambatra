<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class SignatureRequestActivateDTO
{
    #[Assert\NotBlank]
    #[Assert\Uuid]
    public string $signatureRequestId;

    public function __construct(string $signatureRequestId)
    {
        $this->signatureRequestId = $signatureRequestId;
    }
}