<?php


namespace App\Controller;

use App\Entity\User;
use App\Operation\AjoutUtilisateurHandler;

class AjoutUtilisateur
{
    private $recupHandler;
    /**
     * AjoutUtilisateur constructor.
     * @param $recupHandler
     */
    public function __construct(AjoutUtilisateurHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($login, $mdp, $role, $client){
        return $this->recupHandler->handle($login, $mdp, $role, $client);
    }
}