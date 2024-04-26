<?php

namespace App\Repository;

use App\Entity\CompanySchedule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompanySchedule>
 *
 * @method CompanySchedule|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanySchedule|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanySchedule[]    findAll()
 * @method CompanySchedule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyScheduleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanySchedule::class);
    }

//    /**
//     * @return CompanySchedule[] Returns an array of CompanySchedule objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CompanySchedule
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
