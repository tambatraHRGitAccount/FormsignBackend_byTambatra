<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\SignerSearch;
use App\Entity\Signer;
use App\Repository\SignerRepository;

class SignerSearchProvider implements ProviderInterface
{
    public function __construct(
        private SignerRepository $signerRepository
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        return array_map(function (Signer $signer) {
            return SignerSearch::mapFromSigner($signer);
        }, $this->signerRepository->findAllByFilter($context['filters'] ?? []));
    }
}