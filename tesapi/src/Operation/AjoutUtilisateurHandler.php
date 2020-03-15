<?php


namespace App\Operation;

use Doctrine\Persistence\ManagerRegistry;

class AjoutUtilisateurHandler
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
    public function handle($login, $mdp, $role, $client){
        return $this->em->getRepository('App:User')->addUtilisateur($login, $mdp, $role, $client);
    }
}