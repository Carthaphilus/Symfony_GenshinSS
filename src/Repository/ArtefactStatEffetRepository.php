<?php

namespace App\Repository;

use App\Entity\ArtefactStatEffet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArtefactStatEffet|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArtefactStatEffet|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArtefactStatEffet[]    findAll()
 * @method ArtefactStatEffet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtefactStatEffetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArtefactStatEffet::class);
    }

    // /**
    //  * @return ArtefactStatEffet[] Returns an array of ArtefactStatEffet objects
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
    public function findOneBySomeField($value): ?ArtefactStatEffet
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
