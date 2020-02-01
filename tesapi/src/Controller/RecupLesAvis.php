<?php


namespace App\Controller;


use App\Operation\RecupLesAvisHandler;

class RecupLesAvis
{
    private $recupHandler;
    /**
     * RecupLesAvis constructor.
     * @param $recupHandler
     */
    public function __construct(RecupLesAvisHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}