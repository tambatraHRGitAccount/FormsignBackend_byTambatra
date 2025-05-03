<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\Entity\Document;
use App\Entity\Payment;
use App\Entity\PaymentChildren;
use App\Entity\Person;
use App\Entity\Policy;
use App\Entity\PolicyCoverType;
use App\Enum\CustomerStatus;
use App\Enum\DocumentType;
use App\Enum\KycIndicator;
use App\Enum\MaritalStatus;
use App\Enum\ModeOfPayment;
use App\Enum\PersonTitle;
use App\Enum\InsuranceType;
use App\Enum\TransactionType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // PolicyCoverType
        $coverTypes = [];
        foreach (['Comprehensive', 'Third Party'] as $index => $name) {
            $coverType = new PolicyCoverType();
            $coverType->setName($name);
            $manager->persist($coverType);
            $coverTypes[] = $coverType;
            $this->addReference('cover_type_' . $index, $coverType);
        }

        // Person
        $this->loadPersonFixtures($manager);

        // Customer
        $customers = [];
        for ($i = 0; $i < 10; $i++) {
            $customer = new Customer();
            $customer->setSurname($faker->lastName)
                ->setForename($faker->firstName)
                ->setTitle($faker->randomElement(PersonTitle::cases()))
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
                ->setDrivingLicence($faker->numberBetween(100000, 999999))
                ->setProspectNumber($faker->optional()->numberBetween(1, 100))
                ->setMaritalStatus($faker->randomElement(MaritalStatus::cases()))
                ->setKycIndicator($faker->randomElement(KycIndicator::cases()))
                ->setEmployerName($faker->optional()->company);

            if ($customer->getMaritalStatus() === MaritalStatus::MARRIED) {
                $customer->setSpouse($this->getReference('person_' . $faker->numberBetween(0, 19), Person::class));
            }

            $personToContact = $customer->mapToPerson();
            $manager->persist($personToContact);
            $customer->setPersonToContact($personToContact);

            $manager->persist($customer);
            $customers[] = $customer;
            $this->addReference('customer_' . $i, $customer);
        }

        // Document
        foreach ($customers as $index => $customer) {
            for ($j = 0; $j < 2; $j++) {
                $document = new Document();
                $document->setName($faker->word . '.pdf')
                    ->setPath('/uploads/' . $faker->uuid . '.pdf')
                    ->setType($faker->randomElement(DocumentType::cases()))
                    ->setCustomer($customer);
                $manager->persist($document);
            }
        }

        // Payment
        $payments = [];
        for ($i = 0; $i < 5; $i++) {
            $payment = new Payment();
            $payment->setInsurancePeriodFrom($faker->dateTimeThisYear)
                ->setInsurancePeriodTo($faker->dateTimeBetween('now', '+1 year'))
                ->setVehicleNumber($faker->bothify('???###'))
                ->setPolicyNumber($faker->numberBetween(1000, 9999))
                ->setRemarks($faker->sentence)
                ->setAmountRs($faker->randomFloat(2, 1000, 50000))
                ->setModeOfPayment($faker->randomElement(ModeOfPayment::cases()))
                ->setCustomer($customers[$faker->numberBetween(0, 9)]);
            $manager->persist($payment);
            $payments[] = $payment;
            $this->addReference('payment_' . $i, $payment);
        }

        // PaymentChildren
        foreach ($payments as $index => $payment) {
            for ($j = 0; $j < 2; $j++) {
                $paymentChild = new PaymentChildren();
                $paymentChild->setPayment($payment)
                    ->setModeOfPayment($faker->randomElement(ModeOfPayment::cases()))
                    ->setAmountToAllocate($faker->randomFloat(2, 100, 10000));
                $manager->persist($paymentChild);
            }
        }

        // Policy
        foreach ($customers as $index => $customer) {
            $policy = new Policy();
            $policy->setDate($faker->dateTimeThisYear)
                ->setAccMonth($faker->dateTimeThisYear)
                ->setPlacingNumber($faker->numberBetween(1000, 9999))
                ->setQbNumber($faker->numberBetween(1000, 9999))
                ->setPolicyNumber($faker->numberBetween(1000, 9999))
                ->setDateFrom($faker->dateTimeThisYear)
                ->setDateTo($faker->dateTimeBetween('now', '+1 year'))
                ->setMakeAndModel($faker->randomElement(['Toyota Corolla', 'Honda Civic', 'Ford Focus']))
                ->setHp($faker->numberBetween(100, 200) . 'hp')
                ->setBodyType($faker->randomElement(['Sedan', 'Hatchback', 'SUV']))
                ->setMonth($faker->numberBetween(1, 12))
                ->setYear($faker->numberBetween(2015, 2025))
                ->setRegistrationNumber($faker->numberBetween(100000, 999999))
                ->setSumInsured($faker->randomFloat(2, 100000, 1000000))
                ->setExcess($faker->randomFloat(2, 1000, 10000))
                ->setRiskDescription($faker->sentence)
                ->setDriverAtFault($faker->boolean)
                ->setNotAtFaultExcess($faker->boolean)
                ->setAic($faker->boolean)
                ->setRodent($faker->boolean)
                ->setLossOfUse($faker->boolean)
                ->setPassiveTerrorism($faker->boolean)
                ->setAlloyWheel($faker->boolean)
                ->setNetPremium($faker->randomFloat(2, 5000, 20000))
                ->setRate($faker->randomFloat(2, 1, 5))
                ->setGrossPremium($faker->randomFloat(2, 6000, 25000))
                ->setLeasing($faker->optional()->company)
                ->setLien($faker->optional()->company)
                ->setTransactionType($faker->randomElement(TransactionType::cases()))
                ->setInsuranceType($faker->randomElement(InsuranceType::cases()))
                ->setModeOfPayment($faker->randomElement(ModeOfPayment::cases()))
                ->setCoverType($this->getReference('cover_type_' . $faker->numberBetween(0, 1), PolicyCoverType::class))
                ->setCustomer($customer);
            $manager->persist($policy);
        }

        $manager->flush();
    }

    private function loadPersonFixtures(ObjectManager $manager): void
    {
        $faker = Factory::create();

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

            $this->addReference('person_' . $i, $person);
            $manager->persist($person);
        }
    }
}