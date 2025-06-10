<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Document;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DocumentProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;
    private ValidatorInterface $validator;

    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    /**
     * @param Document $data
     * @param array<string, mixed> $uriVariables
     * @param array<string, mixed> $context
     * @return Document
     */
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): Document
    {
        if (!$data instanceof Document) {
            throw new \InvalidArgumentException('Expected instance of Document');
        }

        // Valider l'entité Document
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