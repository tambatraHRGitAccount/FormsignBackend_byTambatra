<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\Entity\Person;
use App\Enum\CustomerStatus;
use App\Enum\KycIndicator;
use App\Enum\MaritalStatus;
use App\Enum\PersonTitle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Person
        $persons = [];
        for ($i = 0; $i < 20; $i++) {
            $person = new Person();
            $person->setSurname($faker->lastName)
                ->setForename($faker->firstName)
                ->setTitle($faker->randomElement(PersonTitle::cases()))
                ->setStreet($faker->streetAddress)
                ->setStreet2($faker->secondaryAddress)
                ->setTown($faker->city)
                ->setZipCode($faker->postcode)
                ->setNationalId($faker->unique()->numerify('ID-########'))
                ->setDateOfBirth($faker->dateTimeThisCentury)
                ->setNationality($faker->country)
                ->setPassport($faker->unique()->numerify('P#-##########'))
                ->setPhone1($faker->phoneNumber)
                ->setPhone2($faker->optional()->phoneNumber)
                ->setPhone3($faker->optional()->phoneNumber)
                ->setPhone4($faker->optional()->phoneNumber)
                ->setEmail($faker->email);

            $manager->persist($person);
            $persons[] = $person;
            $this->addReference('person_' . $i, $person);
        }

        // Customer
        for ($i = 0; $i < 10; $i++) {
            $customer = new Customer();
            $customer->setSurname($faker->lastName)
                ->setForename($faker->firstName)
                ->setTitle($faker->randomElement(PersonTitle::cases()))
                ->setStreet($faker->streetAddress)
                ->setStreet2($faker->secondaryAddress)
                ->setTown($faker->city)
                ->setZipCode($faker->postcode)
                ->setNationalId($faker->unique()->numerify('ID-########'))
                ->setDateOfBirth($faker->dateTimeThisCentury)
                ->setNationality($faker->country)
                ->setPassport($faker->unique()->numerify('P#-##########'))
                ->setPhone1($faker->phoneNumber)
                ->setPhone2($faker->optional()->phoneNumber)
                ->setPhone3($faker->optional()->phoneNumber)
                ->setPhone4($faker->optional()->phoneNumber)
                ->setEmail($faker->email)
                ->setStatus(CustomerStatus::ACTIVE)
                ->setRemark($faker->optional()->sentence)
                ->setCrmClientRef($faker->unique()->numerify('CRM-#####'))
                ->setSwanClientRef($faker->optional()->numerify('SWAN-#####'))
                ->setDtclientRef($faker->optional()->numerify('DT-#####'))
                ->setJobTitle($faker->optional()->jobTitle)
                ->setVanillaLoversLtd($faker->optional()->company)
                ->setEmployerAddress($faker->optional()->address)
                ->setBrn($faker->optional()->numerify('BRN-#####'))
                ->setSourceOfFunds($faker->optional()->sentence)
                ->setAverageMonthlyIncome($faker->optional()->numberBetween(1000, 10000))
                ->setDrivingLicence($faker->numberBetween(100000, 999999))
                ->setProspectNumber($faker->optional()->numberBetween(1, 100))
                ->setMaritalStatus($faker->randomElement(MaritalStatus::cases()))
                ->setKycIndicator($faker->randomElement(KycIndicator::cases()))
                ->setEmployerName($faker->optional()->company);

            if ($customer->getMaritalStatus() === MaritalStatus::MARRIED) {
                $customer->setSpouse($persons[$faker->numberBetween(0, 19)]);
            }

            $customer->setPersonToContact($persons[$faker->numberBetween(0, 19)]);

            $manager->persist($customer);
            $this->addReference('customer_' . $i, $customer);
        }

        $manager->flush();
    }
}