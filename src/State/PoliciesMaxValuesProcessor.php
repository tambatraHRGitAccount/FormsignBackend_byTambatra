<?php
namespace App\State;

use App\Dto\MaxValuesOutput;
use App\Repository\PoliciesRepository;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;

class PoliciesMaxValuesProcessor implements ProcessorInterface
{
    public function __construct(private PoliciesRepository $policiesRepository) {}

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): MaxValuesOutput
    {
        $maxValues = $this->policiesRepository->findMaxValues();

        return new MaxValuesOutput(
            $maxValues['maxQbInvNum'],
            $maxValues['maxPlacingNumber']
        );
    }
}