<?php

namespace App\Repository;

use App\Entity\NombreRapport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NombreRapport|null find($id, $lockMode = null, $lockVersion = null)
 * @method NombreRapport|null findOneBy(array $criteria, array $orderBy = null)
 * @method NombreRapport[]    findAll()
 * @method NombreRapport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NombreRapportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NombreRapport::class);
    }

    // /**
    //  * @return NombreRapport[] Returns an array of NombreRapport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NombreRapport
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
