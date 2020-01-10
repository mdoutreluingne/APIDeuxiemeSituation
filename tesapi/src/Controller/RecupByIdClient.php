<?php


namespace App\Controller;


use App\Operation\RecupTransactionHandler;

class RecupByIdClient
{
    private $recupHandler;
    /**
     * RecupByIdClient constructor.
     * @param $recupHandler
     */
    public function __construct(RecupTransactionHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($id){
        $entitie = $this->recupHandler->handle($id);
        return $entitie;
    }
}