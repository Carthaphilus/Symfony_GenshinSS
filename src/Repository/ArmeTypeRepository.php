<?php

namespace App\Repository;

use App\Entity\ArmeType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArmeType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArmeType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArmeType[]    findAll()
 * @method ArmeType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmeTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArmeType::class);
    }

    // /**
    //  * @return ArmeType[] Returns an array of ArmeType objects
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
    public function findOneBySomeField($value): ?ArmeType
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
