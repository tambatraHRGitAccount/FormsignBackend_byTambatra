<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\DocsDto;
use App\Entity\Docs;
use Doctrine\ORM\EntityManagerInterface;

class DocsProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param mixed $data
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return mixed
     */
    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($operation instanceof Delete) {
            $docs = $this->entityManager->getRepository(Docs::class)->find($uriVariables['id']);
            if ($docs) {
                $this->entityManager->remove($docs);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof DocsDto) {
            if (!empty($uriVariables)) {
                // PUT: Update existing document
                $docs = $this->entityManager->getRepository(Docs::class)->find($uriVariables['id']);
                if (!$docs) {
                    throw new \RuntimeException('Document not found');
                }
            } else {
                // POST: Create new document
                $docs = new Docs();
            }

            // Map DTO to Entity
            $docs->setCrmClientRef($data->crmClientRef);
            $docs->setCrmFile($data->crmFile);
            $docs->setDocName($data->docName);
            $docs->setDocPol($data->docPol);
            $docs->setDocInstruction($data->docInstruction);
            $docs->setDocShortName($data->docShortName);
            $docs->setBase64File($data->base64File);
            $docs->setDocDate($data->docDate ? new \DateTime($data->docDate) : null);

            // Persist the entity
            $this->entityManager->persist($docs);
            $this->entityManager->flush();

            // Map Entity back to DTO for response
            $dto = new DocsDto();
            $dto->crmClientRef = $docs->getCrmClientRef();
            $dto->crmFile = $docs->getCrmFile();
            $dto->docName = $docs->getDocName();
            $dto->docPol = $docs->getDocPol();
            $dto->docInstruction = $docs->getDocInstruction();
            $dto->docShortName = $docs->getDocShortName();
            $dto->base64File = $docs->getBase64File();
            $dto->docDate = $docs->getDocDate() ? $docs->getDocDate()->format('Y-m-d') : null;

            return $dto;
        }

        throw new \RuntimeException('Invalid data type');
    }
}