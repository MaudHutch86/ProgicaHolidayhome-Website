<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\BBSearch;
use App\Entity\HolidayHome;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use phpDocumentor\Reflection\PseudoTypes\True_;

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
        
        return $this->createQueryBuilder('h')
        
            ->orderBy('h.created_at', 'DESC')
            ->setMaxResults(9)
            ->getQuery()
            ->getResult();
    }
           
            
        
    


    
    public function findAllBBSearch(BBSearch $search): array


    {

        $query= $this->createQueryBuilder('h');
        if($search->getMinSurface()){
            $query=$query
                       ->andWhere('g.surface> :minSurface')
                       ->setParameter('minSurface',$search->getMinSurface());
        }
        $query= $this->createQueryBuilder('h');
        if($search->getMaxBedding()){
            $query=$query
                       ->andWhere('g.Bedding> :maxBedding')
                       ->setParameter('maxBedding',$search->getMaxBedding());
        }
        $query= $this->createQueryBuilder('h');
        if($search->getAnimalsAccepted(True)){
            $query=$query
                       ->andWhere('g.animals> :animalsAccepted')
                       ->setParameter('animalsAccepted',$search->getAnimalsAccepted());
        }
        $query= $this->createQueryBuilder('h');
        if($search->getPerCity(true)){
            $query=$query
                       ->andWhere('g.city> :perCity')
                       ->setParameter('perCity',$search->getPerCity());
        }
        $query= $this->createQueryBuilder('h');
        if($search->getPerAmenities(true)){
            $query=$query
                       ->andWhere('g.amenities> :perAmenities')
                       ->setParameter('perAmenities',$search->getPerAmenities());
        }

        return $query->getQuery()->getResult();
      
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
