<?php

namespace App\Repository;

use App\Controller\RecupVilleByNom;
use App\Entity\Client;
use App\Entity\Transaction;
use App\Operation\RecupVilleHandler;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    public function findSolde($id)
    {
        $sql = "SELECT SUM(montant) as 'solde' FROM transaction WHERE client_id = " . $id;
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute(array());
        return ($stmt->fetchall())[0]["solde"];
    }

    public function addClient($nom, $prenom, $ville, $tel, $mail, $archive){
        $sql = "SELECT id FROM ville WHERE nom = '".$ville."';";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute(array());
        $ville = $stmt->fetchall();

        $sql = "INSERT INTO client VALUES (null, :Nom, :Prenom, :Ville, :Tel, :Mail, :Archive)";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute(array(
            ':Nom'=>$nom,
            ':Prenom'=>$prenom,
            ':Ville'=>$ville[0]["id"],
            ':Tel'=>$tel,
            ':Mail'=>$mail,
            ':Archive'=>$archive
        ));
        $sql = "SELECT MAX(id) as 'lastId' FROM client";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute(array());
        return ($stmt->fetchall())[0]["lastId"];
    }

    public function updateClient($id, $nom, $prenom, $ville, $tel, $mail, $archive)
    {
        $client = $this->findById($id);
        if ($nom == "{nom}" || $nom == ",") {
            $nom = $client[0]->getNom();
        }
        if ($prenom == "{prenom}" || $prenom == ",") {
            $prenom = $client[0]->getPrenom();
        }
        if ($ville == "{ville}" || $ville == ",") {
            $ville = $client[0]->getVille()->getId();
        } else {
           $ville = $this->_em->getRepository('App:Ville')->findByNom($ville);
           $ville = $ville[0]->getId();
        }
        if ($tel == "{tel}" || $tel == ",") {
            $tel = $client[0]->getTel();
        }
        if ($mail == "{mail}" || $mail == ",") {
            $mail = $client[0]->getMail();
        } elseif(strpos($mail, ",")){
            $mail = str_replace(",",".",$mail);
        }
        if ($archive == "{archive}" || $archive == ",") {
            $archive = $client[0]->getArchive();
        }
        return $this->createQueryBuilder('c')
            ->update(Client::class, 'c')
            ->set('c.nom', ':nom')
            ->set('c.prenom', ':prenom')
            ->set('c.ville', ':ville')
            ->set('c.tel', ':tel')
            ->set('c.mail', ':mail')
            ->set('c.archive', ':archive')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->setParameter('nom', $nom)
            ->setParameter('prenom', $prenom)
            ->setParameter('ville', $ville)
            ->setParameter('tel', $tel)
            ->setParameter('mail', $mail)
            ->setParameter('archive', $archive)
            ->getQuery()
            ->getResult()
            ;
    }
    // /**
    //  * @return Client[] Returns an array of Client objects
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
    public function findOneBySomeField($value): ?Client
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
