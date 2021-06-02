<?php

namespace App\Repository;

use App\Entity\Artefact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Artefact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artefact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artefact[]    findAll()
 * @method Artefact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtefactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artefact::class);
    }

    // /**
    //  * @return Artefact[] Returns an array of Artefact objects
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
    public function findOneBySomeField($value): ?Artefact
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function getArtefact(){
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT atf.id, atf.label
            FROM App\Entity\Artefact atf
            WHERE atf.nbSetArtefact = 2');
        
        return $query->getResult();
    }
    
    public function getArtefact2($id, $label){
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT atf.id, atf.label
            FROM App\Entity\Artefact atf
            WHERE atf.id <> :id AND atf.nbSetArtefact <> 4 
            OR atf.id = (SELECT atf2.id 
                            FROM App\Entity\Artefact atf2
                            WHERE atf2.label = :label
                            AND atf2.nbSetArtefact = 4)')->setParameters(array('id' => $id, 'label' => $label));
        
        return $query->getResult();
    }
}
