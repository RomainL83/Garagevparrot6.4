<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture implements DependentFixtureInterface
{
    private function generateCars()
    {
        return [
            [
                'brand' => 'Land Rover',
                'model' => 'Range Rover',
                'price' => 51600,
                'kilometer' => 98560,
                'distribution' => 'auto',
                'year' => 2021,
                'fuel' => 'Diesel',
                'illustration' => '/cars/3.png',
            ],
            [
                'brand' => 'BMW',
                'model' => 'Black series',
                'price' => 41600,
                'kilometer' => 35230,
                'distribution' => 'auto',
                'year' => 2022,
                'fuel' => 'Diesel',
                'illustration' => '/cars/4.png',
            ],
            [
                'brand' => 'Citroen',
                'model' => 'DS5 Crossback',
                'price' => 27490,
                'kilometer' => 78013,
                'distribution' => 'auto',
                'year' => 2018,
                'fuel' => 'Diesel',
                'illustration' => '/cars/5.png',
            ],
            [
                'brand' => 'Mercedes',
                'model' => 'GLS',
                'price' => 98938,
                'kilometer' => 1206,
                'distribution' => 'auto',
                'year' => 2022,
                'fuel' => 'Hybrid',
                'illustration' => '/cars/6.png',
            ],
            [
                'brand' => 'Mercedes',
                'model' => 'AMG',
                'price' => 102000,
                'kilometer' => 12000,
                'distribution' => 'auto',
                'year' => 2023,
                'fuel' => 'Essence',
                'illustration' => '/cars/1.png',
            ],
            [
                'brand' => 'Audi',
                'model' => 'Jeep Q3',
                'price' => 36990,
                'kilometer' => 144000,
                'distribution' => 'auto',
                'year' => 2023,
                'fuel' => 'Hybrid',
                'illustration' => '/cars/2.png',
            ],
            [
                'brand' => 'BMW',
                'model' => 'X1',
                'price' => 12000,
                'kilometer' => 187000,
                'distribution' => 'Manuelle',
                'year' => 2018,
                'fuel' => 'Diesel',
                'illustration' => '/cars/7.png',
            ],
            [
                'brand' => 'Volkswagen',
                'model' => 'Polo',
                'price' => 5938,
                'kilometer' => 129000,
                'distribution' => 'Manuelle',
                'year' => 2015,
                'fuel' => 'Diesel',
                'illustration' => '/cars/8.png',
            ],
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $creator = $manager->getRepository(User::class)->findOneBy(['email' => 'vincentparrot@vparrot.com']);

        foreach ($this->generateCars() as $car) {
            $newcar = new Car();
            $newcar->setAddedBy($creator);
            $newcar->setBrand($car['brand']);
            $newcar->setModel($car['model']);
            $newcar->setPrice($car['price']);
            $newcar->setKilometer($car['kilometer']);
            $newcar->setDistribution($car['distribution']);
            $newcar->setYear($car['year']);
            $newcar->setFuel($car['fuel']);
            $newcar->setIllustration($car['illustration']);
            $manager->persist($newcar);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
