<?php


namespace App\Operation;

use Doctrine\Persistence\ManagerRegistry;

class AjoutClientHandler
{
    protected $em;
    /**
     * RecupAvisHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle($nom, $prenom, $ville, $tel, $mail, $archive){
        return $this->em->getRepository('App:Client')->addClient($nom, $prenom, $ville, $tel, $mail, $archive);
    }
}