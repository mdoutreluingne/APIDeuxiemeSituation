<?php

namespace App\Repository;

use App\Entity\Salle;
use App\Entity\Theme;
use App\Entity\Ville;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Salle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Salle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Salle[]    findAll()
 * @method Salle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Salle::class);
    }

    public function findSalles()
    {
        $sql = "select salle.id as salle_id, theme.nom as theme, ville.nom as ville, image.nom as image from salle "
            . "Join ville on ville.id = theme_id "
            . "Join theme on theme.id = theme_id "
            . "Join image on image.id = salle.id "
            . "where salle.archive = 0 "
            . "order by theme.nom ASC ";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute(array());
        return $stmt->fetchAll();
    }

    public function CountSalles()
    {
        return $this->createQueryBuilder('s')
            ->select('count(s.id)')
            ->Where('s.archive = 0')
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }
    // /**
    //  * @return Salle[] Returns an array of Salle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Salle
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
