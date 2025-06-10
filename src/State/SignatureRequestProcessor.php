<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use App\Entity\SignatureRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use ApiPlatform\State\ProcessorInterface;
class SignatureRequestProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;
    private ValidatorInterface $validator;

    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    /**
     * @param SignatureRequest $data
     * @param array<string, mixed> $uriVariables
     * @param array<string, mixed> $context
     * @return SignatureRequest
     */
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): SignatureRequest
    {
        if (!$data instanceof SignatureRequest) {
            throw new \InvalidArgumentException('Expected instance of SignatureRequest');
        }

        // Valider l'entité SignatureRequest
        $errors = $this->validator->validate($data);
        if (count($errors) > 0) {
            throw new \InvalidArgumentException((string) $errors);
        }

        // Persist and flush to database
        $this->entityManager->persist($data);
        $this->entityManager->flush();

        return $data;
    }
}