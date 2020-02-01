<?php


namespace App\Controller;


use App\Operation\RecupCountAvisHandler;

class RecupCountAvis
{
    private $recupHandler;
    /**
     * RecupCountAvis constructor.
     * @param $recupHandler
     */
    public function __construct(RecupCountAvisHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}