<?php
namespace App\Dto;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\State\PoliciesMaxValuesProcessor;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/policies/max-values',
            output: MaxValuesOutput::class,
            name: 'policies_max_values',
            processor: PoliciesMaxValuesProcessor::class,
        ),
    ],
    normalizationContext: ['groups' => ['max_values:read']]
)]
class MaxValuesResource
{
}