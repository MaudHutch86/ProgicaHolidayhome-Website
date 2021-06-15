<?php

namespace App\Repository;

use App\Entity\HolidayHome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HolidayHome|null find($id, $lockMode = null, $lockVersion = null)
 * @method HolidayHome|null findOneBy(array $criteria, array $orderBy = null)
 * @method HolidayHome[]    findAll()
 * @method HolidayHome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HolidayHomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HolidayHome::class);
    }

    // /**
    //  * @return HolidayHome[] Returns an array of HolidayHome objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HolidayHome
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
