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

        $this->loadPersonFixtures($manager);

        // Create 10 fake Customer records
        for ($i = 0; $i < 10; $i++) {
            $customer = new Customer();
            $customer->setSurname($faker->lastName)
                ->setForename($faker->firstName)
                ->setTitle($faker->randomElement(PersonTitle::cases())) // Assuming PersonTitle enum has predefined values
                ->setCrmClientRef($faker->unique()->numerify('CRM-#####'))
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
                ->setSwanClientRef($faker->optional()->numerify('SWAN-#####'))
                ->setDtclientRef($faker->optional()->numerify('DT-#####'))
                ->setJobTitle($faker->optional()->jobTitle)
                ->setVanillaLoversLtd($faker->optional()->company)
                ->setEmployerAddress($faker->optional()->address)
                ->setBrn($faker->optional()->numerify('BRN-#####'))
                ->setSourceOfFunds($faker->optional()->sentence)
                ->setAverageMontlyIncome($faker->optional()->numberBetween(1000, 10000))
                ->setDrivingLicence($faker->numberBetween(2000, 2010))
                ->setProspectNumber($faker->optional()->numberBetween(1, 100))
                ->setMaritalStatus($faker->randomElement(MaritalStatus::cases()))
                ->setKycIndicator($faker->randomElement(KycIndicator::cases()))
                ->setEmployerName($faker->optional()->company)
                ->setSpouse($this->getReference('person_' . $faker->numberBetween(0, 19), Person::class)); 

            $customer->setPersonToContact($customer->mapToPerson());

            $manager->persist($customer);
        }

        // Flush data to database
        $manager->flush();
    }

    private function loadPersonFixtures(ObjectManager $manager) : void {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $person = new Person();
            $person->setSurname($faker->lastName)
                ->setForename($faker->firstName)
                ->setTitle($faker->randomElement(PersonTitle::cases())) // Assuming PersonTitle enum has predefined values
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

            $this->addReference('person_' . $i, $person);

            $manager->persist($person);
            // Add logic to persist the person if it's an entity
            // Example: $manager->persist($person);
        }

        $manager->flush();


    }
}
