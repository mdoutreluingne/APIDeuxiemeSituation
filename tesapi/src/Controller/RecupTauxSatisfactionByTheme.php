<?php


namespace App\Controller;
use App\Entity\Avis;
use App\Operation\RecupTauxHandler;

class RecupTauxSatisfactionByTheme
{
    private $recupHandler;
    /**
     * RecupTauxSatisfactionByTheme constructor.
     * @param $recupHandler
     */
    public function __construct(RecupTauxHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}