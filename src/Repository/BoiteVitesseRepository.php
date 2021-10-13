<?php

namespace App\Repository;

use App\Entity\BoiteVitesse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BoiteVitesse|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoiteVitesse|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoiteVitesse[]    findAll()
 * @method BoiteVitesse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoiteVitesseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoiteVitesse::class);
    }

    // /**
    //  * @return BoiteVitesse[] Returns an array of BoiteVitesse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BoiteVitesse
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
