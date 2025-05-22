<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Dto\LastPolicyNumbersDto;
use App\Entity\Policies;
use Doctrine\ORM\EntityManagerInterface;

class LastPolicyNumbersProvider implements ProviderInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $repository = $this->entityManager->getRepository(Policies::class);
        $lastPolicy = $repository->findOneBy([], ['id' => 'DESC']);

        $dto = new LastPolicyNumbersDto();
        if ($lastPolicy) {
            $dto->placingNumber = $lastPolicy->getPlacingNumber() ?? '3000';
            $dto->qbInvNum = $lastPolicy->getQbInvNum() ?? '23135';
            $dto->policy = $lastPolicy->getPolicy() ?? '10000';
        } else {
            $dto->placingNumber = '3000';
            $dto->qbInvNum = '23135';
            $dto->policy = '10000';
        }

        return $dto;
    }
}