<?php

namespace App\Repository;

use App\Entity\ArmeTypeStatistique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArmeTypeStatistique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArmeTypeStatistique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArmeTypeStatistique[]    findAll()
 * @method ArmeTypeStatistique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmeTypeStatistiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArmeTypeStatistique::class);
    }

    // /**
    //  * @return ArmeTypeStatistique[] Returns an array of ArmeTypeStatistique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArmeTypeStatistique
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function getRaffinement(){
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT DISTINCT(ats.raffinement)
            FROM App\Entity\ArmeTypeStatistique ats');
        
        return $query->getResult();
    }
}
