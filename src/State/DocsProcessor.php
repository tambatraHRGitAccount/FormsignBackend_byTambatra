<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\DocsDto;
use App\Entity\Docs;
use App\Entity\Clients;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
            $doc = $this->entityManager->getRepository(Docs::class)->find($uriVariables['id']);
            if ($doc) {
                // Optionnel : Supprimer le fichier physique si nécessaire
                $filePath = $doc->getFilePath();
                if ($filePath && file_exists($filePath)) {
                    unlink($filePath);
                }
                $this->entityManager->remove($doc);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof DocsDto) {
            // Valider que CRMClientRef existe dans la table clients
            if ($data->crmClientRef) {
                $client = $this->entityManager->getRepository(Clients::class)->findOneBy(['crmClientRef' => $data->crmClientRef]);
                if (!$client) {
                    throw new BadRequestHttpException('Invalid CRMClientRef: Client does not exist');
                }
            } else {
                throw new BadRequestHttpException('CRMClientRef is required');
            }

            if (!empty($uriVariables)) {
                // PUT: Update existing document
                $doc = $this->entityManager->getRepository(Docs::class)->find($uriVariables['id']);
                if (!$doc) {
                    throw new BadRequestHttpException('Document not found');
                }
            } else {
                // POST: Create new document
                $doc = new Docs();
            }

            // Map DTO to Entity
            $doc->setCrmClientRef($data->crmClientRef);
            $doc->setCrmFile($data->crmFile);
            $doc->setDocName($data->docName);
            $doc->setDocPol($data->docPol);
            $doc->setDocInstruction($data->docInstruction);
            $doc->setDocShortName($data->docShortName);
            $doc->setFilePath($data->filePath);
            $doc->setDocDate($data->docDate ? new \DateTime($data->docDate) : null);

            // Persist the entity
            try {
                $this->entityManager->persist($doc);
                $this->entityManager->flush();
            } catch (\Exception $e) {
                throw new BadRequestHttpException('Failed to save document: ' . $e->getMessage());
            }

            // Map Entity back to DTO for response
            $dto = new DocsDto();
            $dto->crmClientRef = $doc->getCrmClientRef();
            $dto->crmFile = $doc->getCrmFile();
            $dto->docName = $doc->getDocName();
            $dto->docPol = $doc->getDocPol();
            $dto->docInstruction = $doc->getDocInstruction();
            $dto->docShortName = $doc->getDocShortName();
            $dto->filePath = $doc->getFilePath();
            $dto->docDate = $doc->getDocDate() ? $doc->getDocDate()->format('Y-m-d') : null;

            return $dto;
        }

        throw new BadRequestHttpException('Invalid data type');
    }
}