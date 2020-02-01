<?php


namespace App\Controller;


use App\Operation\RecupSalleHandler;

class RecupSalle
{
    private $recupHandler;
    /**
     * RecupSalle constructor.
     * @param $recupHandler
     */
    public function __construct(RecupSalleHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}