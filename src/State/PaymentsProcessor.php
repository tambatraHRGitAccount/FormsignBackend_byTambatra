<?php

namespace App\State;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\PaymentsDto;
use App\Entity\Payments;
use Doctrine\ORM\EntityManagerInterface;

class PaymentsProcessor implements ProcessorInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if ($operation instanceof Delete) {
            $payment = $this->entityManager->getRepository(Payments::class)->find($uriVariables['id']);
            if ($payment) {
                $this->entityManager->remove($payment);
                $this->entityManager->flush();
            }
            return null;
        }

        if ($data instanceof PaymentsDto) {
            if (!empty($uriVariables)) {
                $payment = $this->entityManager->getRepository(Payments::class)->find($uriVariables['id']);
                if (!$payment) {
                    throw new \RuntimeException('Payment not found');
                }
            } else {
                $payment = new Payments();
            }

            $payment->setPolicyNum($data->policyNum);
            $payment->setSwanClientRef($data->swanClientRef);
            $payment->setAccMonth($data->accMonth);
            $payment->setAccYear($data->accYear);
            $payment->setPlacingNumber($data->placingNumber);
            $payment->setPaymentNumber($data->paymentNumber);
            $payment->setModeOfPayment($data->modeOfPayment);
            $payment->setDueDate($data->dueDate ? new \DateTime($data->dueDate) : null);
            $payment->setAmountDue($data->amountDue);
            $payment->setPaidDate($data->paidDate ? new \DateTime($data->paidDate) : null);
            $payment->setAmountPaid($data->amountPaid);
            $payment->setCrmClientRef($data->crmClientRef);
            $payment->setTransaction($data->transaction);
            $payment->setQbInvNum($data->qbInvNum);

            $this->entityManager->persist($payment);
            $this->entityManager->flush();

            $dto = new PaymentsDto();
            $dto->policyNum = $payment->getPolicyNum();
            $dto->swanClientRef = $payment->getSwanClientRef();
            $dto->accMonth = $payment->getAccMonth();
            $dto->accYear = $payment->getAccYear();
            $dto->placingNumber = $payment->getPlacingNumber();
            $dto->paymentNumber = $payment->getPaymentNumber();
            $dto->modeOfPayment = $payment->getModeOfPayment();
            $dto->dueDate = $payment->getDueDate() ? $payment->getDueDate()->format('Y-m-d') : null;
            $dto->amountDue = $payment->getAmountDue();
            $dto->paidDate = $payment->getPaidDate() ? $payment->getPaidDate()->format('Y-m-d') : null;
            $dto->amountPaid = $payment->getAmountPaid();
            $dto->crmClientRef = $payment->getCrmClientRef();
            $dto->transaction = $payment->getTransaction();
            $dto->qbInvNum = $payment->getQbInvNum();

            return $dto;
        }

        throw new \RuntimeException('Invalid data type');
    }
}