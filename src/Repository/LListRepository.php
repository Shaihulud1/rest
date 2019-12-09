<?php

namespace App\Repository;

use App\Entity\LList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LList|null find($id, $lockMode = null, $lockVersion = null)
 * @method LList|null findOneBy(array $criteria, array $orderBy = null)
 * @method LList[]    findAll()
 * @method LList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LList::class);
    }

    // /**
    //  * @return LList[] Returns an array of LList objects
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
    public function findOneBySomeField($value): ?LList
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
