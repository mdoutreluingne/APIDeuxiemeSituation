<?php

namespace App\Repository;

use App\Entity\Actualite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Actualite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actualite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actualite[]    findAll()
 * @method Actualite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActualiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actualite::class);
    }

    public function addActu($titre, $paragraphe, $datedebut, $datefin, $image)
    {
        $image = str_replace(',', '.', "$image");
        $sql = "INSERT INTO actualite VALUES (null, :Titre, :Paragraphe, :Datedebut, :Datefin, :Image) ";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        return $stmt->execute(array(':Titre'=>$titre, ':Paragraphe'=>$paragraphe, ':Datedebut'=>$datedebut->format('Y-m-d H:i:s'), ':Datefin'=>$datefin->format('Y-m-d H:i:s'), ':Image'=>$image));

    }

    public function CountActualite()
    {
        return $this->createQueryBuilder('a')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }

    // /**
    //  * @return Actualite[] Returns an array of Actualite objects
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
    public function findOneBySomeField($value): ?Actualite
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
