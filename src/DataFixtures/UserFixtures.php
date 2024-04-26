<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {
    }

    private function generateUsers()
    {
        return [
            [
                'firstName' => 'Vincent',
                'lastName' => 'PARROT',
                'companyFunction' => 'Directeur',
                'email' => 'vincentparrot@vparrot.com',
                'roles' => ['ROLE_ADMIN'],
                'password' => 'password',
                'illustration' =>'/team/1.png',
            ],
            [
                'firstName' => 'Laura',
                'lastName' => 'MARTEL',
                'companyFunction' => 'Mécanicienne',
                'email' => 'lauramartel@vparrot.com',
                'roles' => ['ROLE_EMPLOYEE'],
                'password' => 'password',
                'illustration' =>'/team/2.png',
            ],
            [
                'firstName' => 'Nicolas',
                'lastName' => 'BERTRAND',
                'companyFunction' => 'Mécanicien',
                'email' => 'nicolasbertrand@vparrot.com',
                'roles' => ['ROLE_EMPLOYEE'],
                'password' => 'password',
                'illustration' =>'/team/3.png',
            ],
            [
                'firstName' => 'Sophie',
                'lastName' => 'DURAND',
                'companyFunction' => 'Secrétaire',
                'email' => 'sophiedurand@vparrot.com',
                'roles' => ['ROLE_EMPLOYEE'],
                'password' => 'password',
                'illustration' =>'/team/4.png',
            ],
            [
                'firstName' => 'Etienne',
                'lastName' => 'POIRRET',
                'companyFunction' => 'Mécanicien',
                'email' => 'etiennepoirret@vparrot.com',
                'roles' => ['ROLE_EMPLOYEE'],
                'password' => 'password',
                'illustration' =>'/team/5.png',
            ],
            [
                'firstName' => 'Franck',
                'lastName' => 'SENIOR',
                'companyFunction' => 'Responsable mécanique',
                'email' => 'francksenior@vparrot.com',
                'roles' => ['ROLE_EMPLOYEE'],
                'password' => 'password',
                'illustration' =>'/team/6.png',
            ],
            [
                'firstName' => 'Maxime',
                'lastName' => 'LEGRAND',
                'companyFunction' => 'Commercial',
                'email' => 'maximelegrand@vparrot.com',
                'roles' => ['ROLE_EMPLOYEE'],
                'password' => 'password',
                'illustration' =>'/team/7.png',
            ],
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $company = $manager->getRepository(Company::class)->findAll()[0];

        foreach ($this->generateUsers() as $user) {
            $newuser = new User();
            $newuser->setFirstName($user['firstName']);
            $newuser->setLastName($user['lastName']);
            $newuser->setCompanyFunction($user['companyFunction']);
            $newuser->setemail($user['email']);
            $newuser->setRoles($user['roles']);
            $newuser->setCompany($company);
            $newuser->setPassword($this->passwordHasher->hashPassword($newuser, $user['password']));
            $newuser->setPicture($user['illustration']);
            $manager->persist($newuser);
            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return [
            CompanyFixtures::class,
        ];
    }
}
