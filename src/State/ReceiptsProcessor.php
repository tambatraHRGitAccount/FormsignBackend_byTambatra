<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\ReceiptsDto;
use App\Entity\Receipts;
use Doctrine\ORM\EntityManagerInterface;

class ReceiptsProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($operation instanceof Delete) {
            $receipt = $this->entityManager->getRepository(Receipts::class)->find($uriVariables['id']);
            if ($receipt) {
                $this->entityManager->remove($receipt);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof ReceiptsDto) {
            if (!empty($uriVariables)) {
                $receipt = $this->entityManager->getRepository(Receipts::class)->find($uriVariables['id']);
                if (!$receipt) {
                    throw new \RuntimeException('Receipt not found');
                }
            } else {
                $receipt = new Receipts();
            }

            $receipt->setCrmClientRef($data->crmClientRef);
            $receipt->setReceiptNum($data->receiptNum);
            $receipt->setReceiptDate($data->receiptDate ? new \DateTime($data->receiptDate) : null);
            $receipt->setAmountInLetter($data->amountInLetter);
            $receipt->setAmountInNumbers($data->amountInNumbers);
            $receipt->setDateFrom($data->dateFrom ? new \DateTime($data->dateFrom) : null);
            $receipt->setDateTo($data->dateTo ? new \DateTime($data->dateTo) : null);
            $receipt->setRegistrationNumber($data->registrationNumber);
            $receipt->setPolicyNum($data->policyNum);
            $receipt->setModeOfPayment($data->modeOfPayment);
            $receipt->setBankChequeNum($data->bankChequeNum);
            $receipt->setRemarks($data->remarks);
            $receipt->setClientName($data->clientName);
            $receipt->setLogdment($data->logdment);
            $receipt->setLodgmentDate($data->lodgmentDate ? new \DateTime($data->lodgmentDate) : null);
            $receipt->setField16($data->field16);

            $this->entityManager->persist($receipt);
            $this->entityManager->flush();

            $dto = new ReceiptsDto();
            $dto->crmClientRef = $receipt->getCrmClientRef();
            $dto->receiptNum = $receipt->getReceiptNum();
            $dto->receiptDate = $receipt->getReceiptDate() ? $receipt->getReceiptDate()->format('Y-m-d') : null;
            $dto->amountInLetter = $receipt->getAmountInLetter();
            $dto->amountInNumbers = $receipt->getAmountInNumbers();
            $dto->dateFrom = $receipt->getDateFrom() ? $receipt->getDateFrom()->format('Y-m-d') : null;
            $dto->dateTo = $receipt->getDateTo() ? $receipt->getDateTo()->format('Y-m-d') : null;
            $dto->registrationNumber = $receipt->getRegistrationNumber();
            $dto->policyNum = $receipt->getPolicyNum();
            $dto->modeOfPayment = $receipt->getModeOfPayment();
            $dto->bankChequeNum = $receipt->getBankChequeNum();
            $dto->remarks = $receipt->getRemarks();
            $dto->clientName = $receipt->getClientName();
            $dto->logdment = $receipt->getLogdment();
            $dto->lodgmentDate = $receipt->getLodgmentDate() ? $receipt->getLodgmentDate()->format('Y-m-d') : null;
            $dto->field16 = $receipt->getField16();

            return $dto;
        }

        throw new \RuntimeException('Invalid data type');
    }
}