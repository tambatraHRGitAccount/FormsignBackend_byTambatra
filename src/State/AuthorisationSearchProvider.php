<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\AuthorisationSearch;
use App\Entity\Authorisation;
use Doctrine\ORM\EntityManagerInterface;

class AuthorisationSearchProvider implements ProviderInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return array|object|null
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        $queryBuilder = $this->entityManager->createQueryBuilder()
            ->select('a')
            ->from(Authorisation::class, 'a');

        // Get query parameters from the request
        $queryParameters = $context['request']->query->all();

        // Apply filters based on query parameters
        if (!empty($queryParameters['id_auth'])) {
            $queryBuilder->andWhere('a.id_auth = :id_auth')
                ->setParameter('id_auth', (int) $queryParameters['id_auth']);
        }

        if (!empty($queryParameters['titleAuthPerson'])) {
            $queryBuilder->andWhere('a.titleAuthPerson LIKE :titleAuthPerson')
                ->setParameter('titleAuthPerson', '%' . $queryParameters['titleAuthPerson'] . '%');
        }

        if (!empty($queryParameters['surnameAuthPerson'])) {
            $queryBuilder->andWhere('a.surnameAuthPerson LIKE :surnameAuthPerson')
                ->setParameter('surnameAuthPerson', '%' . $queryParameters['surnameAuthPerson'] . '%');
        }

        if (!empty($queryParameters['forenameAuthPerson'])) {
            $queryBuilder->andWhere('a.forenameAuthPerson LIKE :forenameAuthPerson')
                ->setParameter('forenameAuthPerson', '%' . $queryParameters['forenameAuthPerson'] . '%');
        }

        if (!empty($queryParameters['jobTitleAuthPerson'])) {
            $queryBuilder->andWhere('a.jobTitleAuthPerson LIKE :jobTitleAuthPerson')
                ->setParameter('jobTitleAuthPerson', '%' . $queryParameters['jobTitleAuthPerson'] . '%');
        }

        if (!empty($queryParameters['phone1AuthPerson'])) {
            $queryBuilder->andWhere('a.phone1AuthPerson LIKE :phone1AuthPerson')
                ->setParameter('phone1AuthPerson', '%' . $queryParameters['phone1AuthPerson'] . '%');
        }

        if (!empty($queryParameters['phone2AuthPerson'])) {
            $queryBuilder->andWhere('a.phone2AuthPerson LIKE :phone2AuthPerson')
                ->setParameter('phone2AuthPerson', '%' . $queryParameters['phone2AuthPerson'] . '%');
        }

        if (!empty($queryParameters['phone3AuthPerson'])) {
            $queryBuilder->andWhere('a.phone3AuthPerson LIKE :phone3AuthPerson')
                ->setParameter('phone3AuthPerson', '%' . $queryParameters['phone3AuthPerson'] . '%');
        }

        if (!empty($queryParameters['phone4AuthPerson'])) {
            $queryBuilder->andWhere('a.phone4AuthPerson LIKE :phone4AuthPerson')
                ->setParameter('phone4AuthPerson', '%' . $queryParameters['phone4AuthPerson'] . '%');
        }

        if (!empty($queryParameters['emailAddress1AuthPerson'])) {
            $queryBuilder->andWhere('a.emailAddress1AuthPerson LIKE :emailAddress1AuthPerson')
                ->setParameter('emailAddress1AuthPerson', '%' . $queryParameters['emailAddress1AuthPerson'] . '%');
        }

        if (!empty($queryParameters['crmClientRef'])) {
            $queryBuilder->andWhere('a.crmClientRef LIKE :crmClientRef')
                ->setParameter('crmClientRef', '%' . $queryParameters['crmClientRef'] . '%');
        }

        // Execute the query and get results
        $authorisations = $queryBuilder->getQuery()->getResult();

        // Map entities to AuthorisationSearch objects
        return array_map([AuthorisationSearch::class, 'mapFromAuthorisation'], $authorisations);
    }
}