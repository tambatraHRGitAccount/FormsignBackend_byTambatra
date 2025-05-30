<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\Get;
use App\State\PoliciesMaxProvider;

#[Get(
    provider: PoliciesMaxProvider::class,
    uriTemplate: '/policies-max',
)]
class PoliciesMaxSearch
{
    public ?string $maxPolicyValue = null;

    public function __construct(?string $maxPolicyValue = null)
    {
        $this->maxPolicyValue = $maxPolicyValue;
    }
}