<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\SuccessorsSearch;
use App\Entity\Successors;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class SuccessorsSearchProvider implements ProviderInterface
{
    private $entityManager;
    private $requestStack;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack)
    {
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): array
    {
        $request = $this->requestStack->getCurrentRequest();
        $queryBuilder = $this->entityManager->getRepository(Successors::class)->createQueryBuilder('s');

        // Apply filters based on query parameters
        if ($crmClientRef = $request->query->get('crmClientRef')) {
            $queryBuilder->andWhere('s.crmClientRef = :crmClientRef')
                         ->setParameter('crmClientRef', $crmClientRef);
        }

        if ($title = $request->query->get('title')) {
            $queryBuilder->andWhere('s.title = :title')
                         ->setParameter('title', $title);
        }

        if ($surname = $request->query->get('surname')) {
            $queryBuilder->andWhere('s.surname LIKE :surname')
                         ->setParameter('surname', '%' . $surname . '%');
        }

        if ($forename = $request->query->get('forename')) {
            $queryBuilder->andWhere('s.forename LIKE :forename')
                         ->setParameter('forename', '%' . $forename . '%');
        }

        if ($email_address_1 = $request->query->get('email_address_1')) {
            $queryBuilder->andWhere('s.emailAddress1 LIKE :email_address_1')
                         ->setParameter('email_address_1', '%' . $email_address_1 . '%');
        }

        if ($is_authorized = $request->query->get('is_authorized')) {
            $is_authorized = filter_var($is_authorized, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            if (!is_null($is_authorized)) {
                $queryBuilder->andWhere('s.isAuthorized = :is_authorized')
                             ->setParameter('is_authorized', $is_authorized);
            }
        }

        // Execute query
        $successors = $queryBuilder->getQuery()->getResult();

        // Map results to SuccessorsSearch format
        $result = [];
        foreach ($successors as $successor) {
            $result[] = [
                'id' => $successor->getId(),
                'crmClientRef' => $successor->getCrmClientRef() ?? '',
                'title' => $successor->getTitle() ?? '',
                'surname' => $successor->getSurname() ?? '',
                'forename' => $successor->getForename() ?? '',
                'address' => $successor->getAddress() ?? '',
                'phone1' => $successor->getPhone1() ?? '',
                'phone2' => $successor->getPhone2() ?? '',
                'phone3' => $successor->getPhone3() ?? '',
                'phone4' => $successor->getPhone4() ?? '',
                'email_address_1' => $successor->getEmailAddress1() ?? '',
                'contact_remarks' => $successor->getContactRemarks() ?? '',
                'is_authorized' => $successor->getIsAuthorized() ?? false,
                'created_at' => $successor->getCreatedAt() ? $successor->getCreatedAt()->format('Y-m-d H:i:s') : '',
                'updated_at' => $successor->getUpdatedAt() ? $successor->getUpdatedAt()->format('Y-m-d H:i:s') : '',
            ];
        }

        return $result;
    }
}