<?php

namespace App\Repository;

use App\Entity\Clients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ClientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clients::class);
    }

    public function findAllByFilter(array $filters): array
    {
        $qb = $this->createQueryBuilder('c');

        // Appliquer les filtres pour chaque attribut
        if (!empty($filters['surname'])) {
            $qb->andWhere('c.surname LIKE :surname')
               ->setParameter('surname', '%' . $filters['surname'] . '%');
        }

        if (!empty($filters['forename'])) {
            $qb->andWhere('c.forename LIKE :forename')
               ->setParameter('forename', '%' . $filters['forename'] . '%');
        }

        if (!empty($filters['contact_surname'])) {
            // Supposons que contact_surname correspond à contactName
            $qb->andWhere('c.contactName LIKE :contact_surname')
               ->setParameter('contact_surname', '%' . $filters['contact_surname'] . '%');
        }

        if (!empty($filters['swanclientref'])) {
            $qb->andWhere('c.swanClientRef = :swanclientref')
               ->setParameter('swanclientref', $filters['swanclientref']);
        }

        if (!empty($filters['crmclientref'])) {
            $qb->andWhere('c.crmClientRef = :crmclientref')
               ->setParameter('crmclientref', $filters['crmclientref']);
        }

        if (!empty($filters['phone'])) {
            // Recherche dans phone1, phone2, phone3, phone4
            $qb->andWhere('c.phone1 LIKE :phone OR c.phone2 LIKE :phone OR c.phone3 LIKE :phone OR c.phone4 LIKE :phone')
               ->setParameter('phone', '%' . $filters['phone'] . '%');
        }

        if (!empty($filters['status'])) {
            $qb->andWhere('c.clientStatus = :status')
               ->setParameter('status', $filters['status']);
        }

        if (!empty($filters['title'])) {
            $qb->andWhere('c.title = :title')
               ->setParameter('title', $filters['title']);
        }

        if (!empty($filters['spouseFullName'])) {
            $qb->andWhere('c.spouseFullName LIKE :spouseFullName')
               ->setParameter('spouseFullName', '%' . $filters['spouseFullName'] . '%');
        }

        if (!empty($filters['dtClientRef'])) {
            $qb->andWhere('c.dtClientRef = :dtClientRef')
               ->setParameter('dtClientRef', $filters['dtClientRef']);
        }

        if (!empty($filters['street'])) {
            $qb->andWhere('c.street LIKE :street')
               ->setParameter('street', '%' . $filters['street'] . '%');
        }

        if (!empty($filters['street2'])) {
            $qb->andWhere('c.street2 LIKE :street2')
               ->setParameter('street2', '%' . $filters['street2'] . '%');
        }

        if (!empty($filters['town'])) {
            $qb->andWhere('c.town LIKE :town')
               ->setParameter('town', '%' . $filters['town'] . '%');
        }

        if (!empty($filters['zipCode'])) {
            $qb->andWhere('c.zipCode LIKE :zipCode')
               ->setParameter('zipCode', '%' . $filters['zipCode'] . '%');
        }

        if (!empty($filters['nationalId'])) {
            $qb->andWhere('c.nationalId = :nationalId')
               ->setParameter('nationalId', $filters['nationalId']);
        }

        if (!empty($filters['dateOfBirth'])) {
            $qb->andWhere('c.dateOfBirth = :dateOfBirth')
               ->setParameter('dateOfBirth', new \DateTime($filters['dateOfBirth']));
        }

        if (!empty($filters['nationality'])) {
            $qb->andWhere('c.nationality = :nationality')
               ->setParameter('nationality', $filters['nationality']);
        }

        if (!empty($filters['passportNo'])) {
            $qb->andWhere('c.passportNo = :passportNo')
               ->setParameter('passportNo', $filters['passportNo']);
        }

        if (!empty($filters['emailAddress1'])) {
            $qb->andWhere('c.emailAddress1 LIKE :emailAddress1')
               ->setParameter('emailAddress1', '%' . $filters['emailAddress1'] . '%');
        }

        if (!empty($filters['kycIndicator'])) {
            $qb->andWhere('c.kycIndicator = :kycIndicator')
               ->setParameter('kycIndicator', $filters['kycIndicator']);
        }

        if (!empty($filters['employmentStatus'])) {
            $qb->andWhere('c.employmentStatus = :employmentStatus')
               ->setParameter('employmentStatus', $filters['employmentStatus']);
        }

        if (!empty($filters['jobTitle'])) {
            $qb->andWhere('c.jobTitle LIKE :jobTitle')
               ->setParameter('jobTitle', '%' . $filters['jobTitle'] . '%');
        }

        if (!empty($filters['employerName'])) {
            $qb->andWhere('c.employerName LIKE :employerName')
               ->setParameter('employerName', '%' . $filters['employerName'] . '%');
        }

        if (!empty($filters['employerAddress'])) {
            $qb->andWhere('c.employerAddress LIKE :employerAddress')
               ->setParameter('employerAddress', '%' . $filters['employerAddress'] . '%');
        }

        if (!empty($filters['brn'])) {
            $qb->andWhere('c.brn = :brn')
               ->setParameter('brn', $filters['brn']);
        }

        if (!empty($filters['sourceOfFunds'])) {
            $qb->andWhere('c.sourceOfFunds LIKE :sourceOfFunds')
               ->setParameter('sourceOfFunds', '%' . $filters['sourceOfFunds'] . '%');
        }

        if (!empty($filters['averageMonthlyIncome'])) {
            $qb->andWhere('c.averageMonthlyIncome = :averageMonthlyIncome')
               ->setParameter('averageMonthlyIncome', $filters['averageMonthlyIncome']);
        }

        if (!empty($filters['contactName'])) {
            $qb->andWhere('c.contactName LIKE :contactName')
               ->setParameter('contactName', '%' . $filters['contactName'] . '%');
        }

        if (!empty($filters['contactTitle'])) {
            $qb->andWhere('c.contactTitle LIKE :contactTitle')
               ->setParameter('contactTitle', '%' . $filters['contactTitle'] . '%');
        }

        if (!empty($filters['contactForname'])) {
            $qb->andWhere('c.contactForname LIKE :contactForname')
               ->setParameter('contactForname', '%' . $filters['contactForname'] . '%');
        }

        if (!empty($filters['contactPhone1'])) {
            $qb->andWhere('c.contactPhone1 LIKE :contactPhone1')
               ->setParameter('contactPhone1', '%' . $filters['contactPhone1'] . '%');
        }

        if (!empty($filters['contactEmail'])) {
            $qb->andWhere('c.contactEmail LIKE :contactEmail')
               ->setParameter('contactEmail', '%' . $filters['contactEmail'] . '%');
        }

        if (!empty($filters['contactPhone2'])) {
            $qb->andWhere('c.contactPhone2 LIKE :contactPhone2')
               ->setParameter('contactPhone2', '%' . $filters['contactPhone2'] . '%');
        }

        if (!empty($filters['contactPhone3'])) {
            $qb->andWhere('c.contactPhone3 LIKE :contactPhone3')
               ->setParameter('contactPhone3', '%' . $filters['contactPhone3'] . '%');
        }

        if (!empty($filters['contactPhone4'])) {
            $qb->andWhere('c.contactPhone4 LIKE :contactPhone4')
               ->setParameter('contactPhone4', '%' . $filters['contactPhone4'] . '%');
        }

        if (!empty($filters['prospectNumber'])) {
            $qb->andWhere('c.prospectNumber = :prospectNumber')
               ->setParameter('prospectNumber', $filters['prospectNumber']);
        }

        if (!empty($filters['clientStatus'])) {
            $qb->andWhere('c.clientStatus = :clientStatus')
               ->setParameter('clientStatus', $filters['clientStatus']);
        }

        if (!empty($filters['contactDetailsModif'])) {
            $qb->andWhere('c.contactDetailsModif LIKE :contactDetailsModif')
               ->setParameter('contactDetailsModif', '%' . $filters['contactDetailsModif'] . '%');
        }

        if (!empty($filters['personalDetailsModif'])) {
            $qb->andWhere('c.personalDetailsModif LIKE :personalDetailsModif')
               ->setParameter('personalDetailsModif', '%' . $filters['personalDetailsModif'] . '%');
        }

        if (!empty($filters['employmentModif'])) {
            $qb->andWhere('c.employmentModif LIKE :employmentModif')
               ->setParameter('employmentModif', '%' . $filters['employmentModif'] . '%');
        }

        if (!empty($filters['drivingLicence'])) {
            $qb->andWhere('c.drivingLicence = :drivingLicence')
               ->setParameter('drivingLicence', $filters['drivingLicence']);
        }

        if (!empty($filters['maritalStatus'])) {
            $qb->andWhere('c.maritalStatus = :maritalStatus')
               ->setParameter('maritalStatus', $filters['maritalStatus']);
        }

        if (!empty($filters['children'])) {
            $qb->andWhere('c.children LIKE :children')
               ->setParameter('children', '%' . $filters['children'] . '%');
        }

        if (!empty($filters['clientSince'])) {
            $qb->andWhere('c.clientSince = :clientSince')
               ->setParameter('clientSince', new \DateTime($filters['clientSince']));
        }

        if (!empty($filters['contactRemarks'])) {
            $qb->andWhere('c.contactRemarks LIKE :contactRemarks')
               ->setParameter('contactRemarks', '%' . $filters['contactRemarks'] . '%');
        }

        if (!empty($filters['drivingRemarks'])) {
            $qb->andWhere('c.drivingRemarks LIKE :drivingRemarks')
               ->setParameter('drivingRemarks', '%' . $filters['drivingRemarks'] . '%');
        }

        return $qb->getQuery()->getResult();
    }
}