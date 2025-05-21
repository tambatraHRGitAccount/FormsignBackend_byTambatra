<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\DebtorsDto;
use App\Entity\Debtors;
use App\Entity\Clients;
use App\Repository\DebtorsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DebtorsProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;
    private DebtorsRepository $debtorsRepository;

    public function __construct(EntityManagerInterface $entityManager, DebtorsRepository $debtorsRepository)
    {
        $this->entityManager = $entityManager;
        $this->debtorsRepository = $debtorsRepository;
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
            $debtor = $this->debtorsRepository->find($uriVariables['id']);
            if (!$debtor) {
                throw new NotFoundHttpException('Debtor not found');
            }
            $this->entityManager->remove($debtor);
            $this->entityManager->flush();
            return null;
        }

        if ($data instanceof DebtorsDto) {
            // Validate that CRMClientRef exists in the clients table
            if ($data->crmClientRef) {
                $client = $this->entityManager->getRepository(Clients::class)->findOneBy(['crmClientRef' => $data->crmClientRef]);
                if (!$client) {
                    throw new NotFoundHttpException('Client with crmClientRef ' . $data->crmClientRef . ' not found');
                }
            } else {
                throw new BadRequestHttpException('CRMClientRef is required');
            }

            if (!empty($uriVariables)) {
                // PUT: Update existing debtor
                $debtor = $this->debtorsRepository->find($uriVariables['id']);
                if (!$debtor) {
                    throw new NotFoundHttpException('Debtor not found');
                }
            } else {
                // POST: Create new debtor
                $debtor = new Debtors();
            }

            // Map DTO to Entity
            $debtor->setCrmClientRef($data->crmClientRef);
            $debtor->setReceiptDate($data->receiptDate ? new \DateTime($data->receiptDate) : null);
            $debtor->setTransact($data->transact);
            $debtor->setPolicyNum($data->policyNum);
            $debtor->setPlacingNum($data->placingNum);
            $debtor->setReceiptNum($data->receiptNum);
            $debtor->setModeOfPayment($data->modeOfPayment);
            $debtor->setTransactionRef($data->transactionRef);
            $debtor->setAmount($data->amount !== null ? (string)$data->amount : null);
            $debtor->setClientName($data->clientName);

            // Persist the entity
            try {
                $this->entityManager->persist($debtor);
                $this->entityManager->flush();
            } catch (\Exception $e) {
                throw new BadRequestHttpException('Failed to save debtor: ' . $e->getMessage());
            }

            // Map Entity back to DTO for response
            $dto = new DebtorsDto();
            $dto->crmClientRef = $debtor->getCrmClientRef();
            $dto->receiptDate = $debtor->getReceiptDate() ? $debtor->getReceiptDate()->format('Y-m-d') : null;
            $dto->transact = $debtor->getTransact();
            $dto->policyNum = $debtor->getPolicyNum();
            $dto->placingNum = $debtor->getPlacingNum();
            $dto->receiptNum = $debtor->getReceiptNum();
            $dto->modeOfPayment = $debtor->getModeOfPayment();
            $dto->transactionRef = $debtor->getTransactionRef();
            $dto->amount = $debtor->getAmount() !== null ? (float)$debtor->getAmount() : null;
            $dto->clientName = $debtor->getClientName();

            return $dto;
        }

        throw new BadRequestHttpException('Invalid data type');
    }
}