<?php


namespace App\Controller;
use App\Entity\Avis;
use App\Operation\RecupAvisHandler;

class RecupAvisByTheme
{
    private $recupHandler;
    /**
     * RecupAvisByTheme constructor.
     * @param $recupHandler
     */
    public function __construct(RecupAvisHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($theme){
        $entitie = $this->recupHandler->handle($theme);
        return $entitie;
    }
}