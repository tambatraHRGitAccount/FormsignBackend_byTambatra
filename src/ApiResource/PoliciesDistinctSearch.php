<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\QueryParameter;
use App\State\PoliciesDistinctProvider;

#[GetCollection(
    provider: PoliciesDistinctProvider::class,
    uriTemplate: '/policies-distinct',
)]
#[QueryParameter(key: 'crmClientRef')]
class PoliciesDistinctSearch
{
    public ?string $policy = null;
    public ?string $crmClientRef = null;
    public ?bool $policyExists = null;

    public function __construct(?string $policy = null, ?string $crmClientRef = null, ?bool $policyExists = null)
    {
        $this->policy = $policy;
        $this->crmClientRef = $crmClientRef;
        $this->policyExists = $policyExists;
    }
}