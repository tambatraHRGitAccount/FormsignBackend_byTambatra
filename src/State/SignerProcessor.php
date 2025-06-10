<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use App\Entity\Signer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use ApiPlatform\State\ProcessorInterface;
class SignerProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;
    private ValidatorInterface $validator;

    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    /**
     * @param Signer $data
     * @param array<string, mixed> $uriVariables
     * @param array<string, mixed> $context
     * @return Signer
     */
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): Signer
    {
        if (!$data instanceof Signer) {
            throw new \InvalidArgumentException('Expected instance of Signer');
        }

        // Vérifier que la SignatureRequest est bien liée
        if ($data->getSignatureRequest() === null) {
            throw new \InvalidArgumentException('No SignatureRequest associated with Signer');
        }

        // Valider l'entité Signer
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