<?php

namespace App\Repository;

use App\Entity\Avis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Avis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avis[]    findAll()
 * @method Avis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avis::class);
    }

    public function findTauxSatisfactionByTheme()
    {

        $sql = "select (AVG(avis.note)/MAX(avis.note)*100) as taux from avis "
            . "Join salle on salle.id = salle_id "
            . "Join theme on theme.id = theme_id "
            . "where salle.archive = 0 "
            . "group by theme.nom "
            . "order by theme.nom ASC ";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute(array());
        return $stmt->fetchAll();
    }

    public function findAllAvis()
    {
        $sql = "select avis.id, note, commentaire, theme.nom as theme from avis "
            . "Join salle on salle.id = salle_id "
            . "Join theme on theme.id = theme_id ";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute(array());
        return $stmt->fetchAll();
    }

    public function CountAvis()
    {
        return $this->createQueryBuilder('a')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }

    // /**
    //  * @return Avis[] Returns an array of Avis objects
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
    public function findOneBySomeField($value): ?Avis
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
