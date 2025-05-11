<?php

namespace App\Repository;

use App\Entity\Receipts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReceiptsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Receipts::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createQueryBuilder('r');

        if (!empty($filters['crmClientRef'])) {
            $qb->andWhere('r.crmClientRef = :crmClientRef')
               ->setParameter('crmClientRef', $filters['crmClientRef']);
        }

        if (!empty($filters['receiptNum'])) {
            $qb->andWhere('r.receiptNum = :receiptNum')
               ->setParameter('receiptNum', $filters['receiptNum']);
        }

        if (!empty($filters['receiptDate'])) {
            $qb->andWhere('r.receiptDate = :receiptDate')
               ->setParameter('receiptDate', new \DateTime($filters['receiptDate']));
        }

        if (!empty($filters['amountInLetter'])) {
            $qb->andWhere('r.amountInLetter LIKE :amountInLetter')
               ->setParameter('amountInLetter', '%' . $filters['amountInLetter'] . '%');
        }

        if (!empty($filters['amountInNumbers'])) {
            $qb->andWhere('r.amountInNumbers = :amountInNumbers')
               ->setParameter('amountInNumbers', $filters['amountInNumbers']);
        }

        if (!empty($filters['dateFrom'])) {
            $qb->andWhere('r.dateFrom = :dateFrom')
               ->setParameter('dateFrom', new \DateTime($filters['dateFrom']));
        }

        if (!empty($filters['dateTo'])) {
            $qb->andWhere('r.dateTo = :dateTo')
               ->setParameter('dateTo', new \DateTime($filters['dateTo']));
        }

        if (!empty($filters['registrationNumber'])) {
            $qb->andWhere('r.registrationNumber = :registrationNumber')
               ->setParameter('registrationNumber', $filters['registrationNumber']);
        }

        if (!empty($filters['policyNum'])) {
            $qb->andWhere('r.policyNum = :policyNum')
               ->setParameter('policyNum', $filters['policyNum']);
        }

        if (!empty($filters['modeOfPayment'])) {
            $qb->andWhere('r.modeOfPayment LIKE :modeOfPayment')
               ->setParameter('modeOfPayment', '%' . $filters['modeOfPayment'] . '%');
        }

        if (!empty($filters['bankChequeNum'])) {
            $qb->andWhere('r.bankChequeNum = :bankChequeNum')
               ->setParameter('bankChequeNum', $filters['bankChequeNum']);
        }

        if (!empty($filters['remarks'])) {
            $qb->andWhere('r.remarks LIKE :remarks')
               ->setParameter('remarks', '%' . $filters['remarks'] . '%');
        }

        if (!empty($filters['clientName'])) {
            $qb->andWhere('r.clientName LIKE :clientName')
               ->setParameter('clientName', '%' . $filters['clientName'] . '%');
        }

        if (!empty($filters['logdment'])) {
            $qb->andWhere('r.logdment = :logdment')
               ->setParameter('logdment', $filters['logdment']);
        }

        if (!empty($filters['lodgmentDate'])) {
            $qb->andWhere('r.lodgmentDate = :lodgmentDate')
               ->setParameter('lodgmentDate', new \DateTime($filters['lodgmentDate']));
        }

        if (!empty($filters['field16'])) {
            $qb->andWhere('r.field16 = :field16')
               ->setParameter('field16', $filters['field16']);
        }

        return $qb->getQuery()->getResult();
    }
}