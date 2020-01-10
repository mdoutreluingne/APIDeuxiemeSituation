<?php


namespace App\Controller;


use App\Operation\RecupVilleHandler;

class RecupVilleByNom
{
    private $recupHandler;
    /**
     * RecupVilleByNom constructor.
     * @param $recupHandler
     */
    public function __construct(RecupVilleHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($nom){
        $entitie = $this->recupHandler->handle($nom);
        return $entitie;
    }
}