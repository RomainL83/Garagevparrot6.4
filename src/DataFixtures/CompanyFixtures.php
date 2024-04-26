<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $company = new Company();
        $company->setName('Garage VPARROT');
        $company->setAddress('125 Rue de la république');
        $company->setCity('Toulouse');
        $company->setPostalCode('33100');
        $company->setCountry('France');
        $company->setEmail('contact@vparrot.com');
        $company->setPhoneNumber('05.34.12.34.56');

        $manager->persist($company);
        $manager->flush();
    }
}
