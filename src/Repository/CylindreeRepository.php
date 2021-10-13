<?php

namespace App\Repository;

use App\Entity\Cylindree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cylindree|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cylindree|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cylindree[]    findAll()
 * @method Cylindree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CylindreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cylindree::class);
    }

    // /**
    //  * @return Cylindree[] Returns an array of Cylindree objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cylindree
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
