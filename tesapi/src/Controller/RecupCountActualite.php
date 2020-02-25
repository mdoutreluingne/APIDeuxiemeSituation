<?php


namespace App\Controller;


use App\Operation\RecupCountActualiteHandler;

class RecupCountActualite
{
    private $recupHandler;
    /**
     * RecupCountActualite constructor.
     * @param $recupHandler
     */
    public function __construct(RecupCountActualiteHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}