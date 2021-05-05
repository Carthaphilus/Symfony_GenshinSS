<?php

namespace App\Repository;

use App\Entity\TypeStatistique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeStatistique|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeStatistique|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeStatistique[]    findAll()
 * @method TypeStatistique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeStatistiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeStatistique::class);
    }

    // /**
    //  * @return TypeStatistique[] Returns an array of TypeStatistique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeStatistique
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
