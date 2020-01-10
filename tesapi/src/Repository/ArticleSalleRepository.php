<?php

namespace App\Repository;

use App\Entity\ArticleSalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ArticleSalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleSalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleSalle[]    findAll()
 * @method ArticleSalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleSalleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleSalle::class);
    }

    // /**
    //  * @return ArticleSalle[] Returns an array of ArticleSalle objects
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
    public function findOneBySomeField($value): ?ArticleSalle
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
