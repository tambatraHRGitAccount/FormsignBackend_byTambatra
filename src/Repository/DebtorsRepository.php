<?php

namespace App\Repository;

use App\Entity\Debtors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @extends ServiceEntityRepository<Debtors>
 *
 * @method Debtors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Debtors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Debtors[] findAll()
 * @method Debtors[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DebtorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Debtors::class);
    }

    /**
     * Find debtors by CRMClientRef.
     *
     * @param string $crmClientRef
     * @param int|null $limit
     * @param int|null $offset
     * @return Debtors[]
     */
    public function findByCrmClientRef(string $crmClientRef, ?int $limit = null, ?int $offset = null): array
    {
        return $this->createBaseQueryBuilder('d')
            ->where('d.crmClientRef = :crmClientRef')
            ->setParameter('crmClientRef', $crmClientRef)
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getQuery()
            ->getResult();
    }

    /**
     * Find debtors by receipt date range.
     *
     * @param \DateTimeInterface $startDate
     * @param \DateTimeInterface $endDate
     * @param int|null $limit
     * @param int|null $offset
     * @return Debtors[]
     */
    public function findByReceiptDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate, ?int $limit = null, ?int $offset = null): array
    {
        return $this->createBaseQueryBuilder('d')
            ->where('d.receiptDate BETWEEN :startDate AND :endDate')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getQuery()
            ->getResult();
    }

    /**
     * Find a debtor by Transaction_Ref.
     *
     * @param string $transactionRef
     * @return Debtors|null
     */
    public function findOneByTransactionRef(string $transactionRef): ?Debtors
    {
        return $this->createBaseQueryBuilder('d')
            ->where('d.transactionRef = :transactionRef')
            ->setParameter('transactionRef', $transactionRef)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Find a debtor by POLICY_NUM.
     *
     * @param string $policyNum
     * @return Debtors|null
     */
    public function findOneByPolicyNum(string $policyNum): ?Debtors
    {
        return $this->createBaseQueryBuilder('d')
            ->where('d.policyNum = :policyNum')
            ->setParameter('policyNum', $policyNum)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Get all debtors with pagination.
     *
     * @param int|null $limit
     * @param int|null $offset
     * @return Debtors[]
     */
    public function findAllWithPagination(?int $limit = null, ?int $offset = null): array
    {
        return $this->createBaseQueryBuilder('d')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getQuery()
            ->getResult();
    }

    /**
     * Create a base QueryBuilder for custom queries with default sorting.
     *
     * @param string $alias
     * @return QueryBuilder
     */
    private function createBaseQueryBuilder(string $alias): QueryBuilder
    {
        return parent::createQueryBuilder($alias)
            ->addOrderBy("$alias.receiptDate", 'DESC');
    }

    /**
     * Find debtors by filter criteria.
     *
     * @param array $filters
     * @return Debtors[]
     */
    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createBaseQueryBuilder('d');

        if (!empty($filters['crmClientRef'])) {
            $qb->andWhere('d.crmClientRef = :crmClientRef')
               ->setParameter('crmClientRef', $filters['crmClientRef']);
        }

        if (!empty($filters['receiptDate'])) {
            $qb->andWhere('d.receiptDate = :receiptDate')
               ->setParameter('receiptDate', new \DateTime($filters['receiptDate']));
        }

        if (!empty($filters['policyNum'])) {
            $qb->andWhere('d.policyNum = :policyNum')
               ->setParameter('policyNum', $filters['policyNum']);
        }

        if (!empty($filters['placingNum'])) {
            $qb->andWhere('d.placingNum = :placingNum')
               ->setParameter('placingNum', $filters['placingNum']);
        }

        if (!empty($filters['receiptNum'])) {
            $qb->andWhere('d.receiptNum = :receiptNum')
               ->setParameter('receiptNum', $filters['receiptNum']);
        }

        if (!empty($filters['modeOfPayment'])) {
            $qb->andWhere('d.modeOfPayment = :modeOfPayment')
               ->setParameter('modeOfPayment', $filters['modeOfPayment']);
        }

        if (!empty($filters['transactionRef'])) {
            $qb->andWhere('d.transactionRef = :transactionRef')
               ->setParameter('transactionRef', $filters['transactionRef']);
        }

        if (!empty($filters['clientName'])) {
            $qb->andWhere('d.clientName LIKE :clientName')
               ->setParameter('clientName', '%' . $filters['clientName'] . '%');
        }

        return $qb->getQuery()->getResult();
    }
}