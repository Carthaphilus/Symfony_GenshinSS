<?php

namespace App\Repository;

use App\Entity\Arme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Arme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Arme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Arme[]    findAll()
 * @method Arme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Arme::class);
    }

    // /**
    //  * @return Arme[] Returns an array of Arme objects
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
    public function findOneBySomeField($value): ?Arme
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function getArmeByPersonnage(int $id){
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT a
            FROM App\Entity\Arme a
            INNER JOIN App\Entity\ArmeType at
            INNER JOIN App\Entity\Personnage p
            WHERE p.personnageId = :id')->setParameter('id', $id);
        
        return $query->getResult();
    }
}
