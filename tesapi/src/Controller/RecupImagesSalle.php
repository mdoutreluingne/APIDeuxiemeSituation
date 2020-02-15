<?php


namespace App\Controller;


use App\Operation\RecupImagesSalleHandler;

class RecupImagesSalle
{
    private $recupHandler;
    /**
     * RecupImagesSalle constructor.
     * @param $recupHandler
     */
    public function __construct(RecupImagesSalleHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}