<?php

namespace App\Repository;

use App\Entity\Configuration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Configuration|null find($id, $lockMode = null, $lockVersion = null)
 * @method Configuration|null findOneBy(array $criteria, array $orderBy = null)
 * @method Configuration[]    findAll()
 * @method Configuration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigurationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Configuration::class);
    }

    public function updateNombreAvis($nbcommentaire, $nbavis, $notemini)
    {
        $config = $this->findById(1);
        if ($nbcommentaire == "{nbcommentaire}" || $nbcommentaire == ",")
        {
            $nbcommentaire = $config[0]->getNbCommentaire();
        }
        if ($nbavis == "{nbavis}" || $nbavis == ",")
        {
            $nbavis = $config[0]->getNbAvis();
        }
        if ($notemini == "{notemini}" || $notemini == ",")
        {
            $notemini = $config[0]->getNoteMin();
        }
        return $this->createQueryBuilder('c')
            ->update(Configuration::class, 'c')
            ->set('c.nb_commentaire', ':nbcommentaire')
            ->set('c.nb_avis', ':nbavis')
            ->set('c.note_min', ':notemini')
            ->setParameter('nbcommentaire', $nbcommentaire)
            ->setParameter('nbavis', $nbavis)
            ->setParameter('notemini', $notemini)
            ->getQuery()
            ->getResult()
            ;
    }
    // /**
    //  * @return Configuration[] Returns an array of Configuration objects
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
    public function findOneBySomeField($value): ?Configuration
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
