<?php

namespace App\Repository;

use App\Entity\LotAchat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LotAchat|null find($id, $lockMode = null, $lockVersion = null)
 * @method LotAchat|null findOneBy(array $criteria, array $orderBy = null)
 * @method LotAchat[]    findAll()
 * @method LotAchat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LotAchatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LotAchat::class);
    }

    // /**
    //  * @return LotAchat[] Returns an array of LotAchat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LotAchat
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
