<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\CompanyService;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CompanyServiceFixtures extends Fixture implements DependentFixtureInterface
{
    private function generateServices()
    {
        return [
            [
                'name' => 'Remplacement des pneumatiques',
                'description' => 'Remplacement de 1 à 4 pneumatiques',
                'price' => 25.00,
                'completionTime' => '01:00',
            ],
            [
                'name' => 'Peinture capot',
                'description' => 'Application d\'une nouvelle peinture sur le capot',
                'price' => 50.00,
                'completionTime' => '01:30',
            ],
            [
                'name' => 'Peinture portière',
                'description' => 'Application d\'une nouvelle peinture sur une portière',
                'price' => 50.00,
                'completionTime' => '01:30',
            ],
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $company = $manager->getRepository(Company::class)->findAll()[0];

        foreach ($this->generateServices() as $service) {
            $companyService = new CompanyService();
            $companyService->setName($service['name']);
            $companyService->setDescription($service['description']);
            $companyService->setPrice($service['price']);
            $companyService->setCompletionTime(new DateTime($service['completionTime']));
            $companyService->setCompany($company);

            $manager->persist($companyService);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CompanyFixtures::class,
        ];
    }
}
