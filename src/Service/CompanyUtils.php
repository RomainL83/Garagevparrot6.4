<?php

namespace App\Service;

use App\Entity\Company;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class CompanyUtils
{
    public function __construct(
       private readonly EntityManagerInterface $entityManager
    ) {
    }

    public function getCompany()
    {
        return $this->entityManager->getRepository(Company::class)->findAll()[0];
    }

    public function getTeam()
    {
        return $this->entityManager->getRepository(User::class)->findByRoles(['ROLE_ADMIN', 'ROLE_EMPLOYEE']);
    }
}