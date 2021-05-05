<?php

namespace App\Repository;

use App\Entity\PersonnageNiveau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonnageNiveau|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonnageNiveau|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonnageNiveau[]    findAll()
 * @method PersonnageNiveau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnageNiveauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonnageNiveau::class);
    }

    // /**
    //  * @return PersonnageNiveau[] Returns an array of PersonnageNiveau objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PersonnageNiveau
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
