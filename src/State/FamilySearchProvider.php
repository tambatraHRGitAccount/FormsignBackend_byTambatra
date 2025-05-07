<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\FamilySearch;
use App\Entity\Family;
use App\Enum\FamilyType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class FamilySearchProvider implements ProviderInterface
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
        $queryBuilder = $this->entityManager->getRepository(Family::class)->createQueryBuilder('f');

        // Apply filters based on query parameters
        if ($crmClientRef = $request->query->get('crmClientRef')) {
            $queryBuilder->andWhere('f.crmClientRef = :crmClientRef') // Exact match
                         ->setParameter('crmClientRef', $crmClientRef);
        }

        if ($type = $request->query->get('type')) {
            try {
                $familyType = FamilyType::from($type);
                $queryBuilder->andWhere('f.type = :type')
                             ->setParameter('type', $familyType);
            } catch (\ValueError $e) {
                // Ignore invalid enum values
            }
        }

        if ($surname = $request->query->get('surname')) {
            $queryBuilder->andWhere('f.surname LIKE :surname')
                         ->setParameter('surname', '%' . $surname . '%');
        }

        if ($forename = $request->query->get('forename')) {
            $queryBuilder->andWhere('f.forename LIKE :forename')
                         ->setParameter('forename', '%' . $forename . '%');
        }

        if ($dateOfBirth = $request->query->get('dateOfBirth')) {
            try {
                $date = new \DateTime($dateOfBirth);
                $queryBuilder->andWhere('f.dateOfBirth = :dateOfBirth')
                             ->setParameter('dateOfBirth', $date->format('Y-m-d'));
            } catch (\Exception $e) {
                // Ignore invalid date formats
            }
        }

        if ($age = $request->query->get('age')) {
            if (is_numeric($age)) {
                $queryBuilder->andWhere('f.age = :age')
                             ->setParameter('age', (int) $age);
            }
        }

        // Execute query
        $families = $queryBuilder->getQuery()->getResult();

        // Group results by crmClientRef and structure as { spouse: {...}, children: [...] }
        $result = [
            'spouse' => null,
            'children' => [],
        ];

        foreach ($families as $family) {
            $familyData = [
                'surname' => $family->getSurname() ?? '',
                'forename' => $family->getForename() ?? '',
                'dateOfBirth' => $family->getDateOfBirth() ? $family->getDateOfBirth()->format('Y-m-d') : '',
                'age' => $family->getAge() ?? '',
            ];

            if ($family->getType() === FamilyType::SPOUSE) {
                $result['spouse'] = $familyData;
            } elseif ($family->getType() === FamilyType::CHILD) {
                $result['children'][] = $familyData;
            }
        }

        return $result;
    }
}