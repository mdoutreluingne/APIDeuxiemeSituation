<?php


namespace App\Controller;


use App\Operation\RecupCountSalleHandler;

class RecupCountSalle
{
    private $recupHandler;
    /**
     * RecupCountSalle constructor.
     * @param $recupHandler
     */
    public function __construct(RecupCountSalleHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}