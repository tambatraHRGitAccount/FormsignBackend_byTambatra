<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\SignatureRequestSearch;
use App\Entity\SignatureRequest;
use App\Repository\SignatureRequestRepository;

class SignatureRequestSearchProvider implements ProviderInterface
{
    public function __construct(
        private SignatureRequestRepository $signatureRequestRepository
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        return array_map(function (SignatureRequest $signatureRequest) {
            return SignatureRequestSearch::mapFromSignatureRequest($signatureRequest);
        }, $this->signatureRequestRepository->findAllByFilter($context['filters'] ?? []));
    }
}