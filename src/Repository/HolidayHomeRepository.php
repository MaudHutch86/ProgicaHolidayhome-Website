<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\BBSearch;
use App\Entity\HolidayHome;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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
     /**
      * @return Query
      */
    
    public function findAllVisibleQuery( BBSearch $search): Query
    {     
        return $this->createQueryBuilder('h')
    ->getQuery();
    
    
    }

/**
 * @return HolidayHome[]
 */

     
    public function findLatestBB():array
    {
        
        return $this->findVisibleQuery()
        
            ->orderBy('created_at', 'DESC');
           
            
        ;
    }
    

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
