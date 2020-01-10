<?php


namespace App\Operation;


use Doctrine\Persistence\ManagerRegistry;

class ModifClientHandler
{
    protected $em;
    /**
     * ModifClientHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle($id, $nom, $prenom, $ville, $tel, $mail, $archive){
        return $this->em->getRepository('App:Client')->updateClient($id, $nom, $prenom, $ville, $tel, $mail, $archive);
    }
}