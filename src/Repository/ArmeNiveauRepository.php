<?php

namespace App\Repository;

use App\Entity\ArmeNiveau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArmeNiveau|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArmeNiveau|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArmeNiveau[]    findAll()
 * @method ArmeNiveau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmeNiveauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArmeNiveau::class);
    }

    // /**
    //  * @return ArmeNiveau[] Returns an array of ArmeNiveau objects
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
    public function findOneBySomeField($value): ?ArmeNiveau
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
