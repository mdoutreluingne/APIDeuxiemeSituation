<?php


namespace App\Controller;


use App\Operation\RecupReservationHandler;

class RecupReservationByClient
{
    private $recupHandler;
    /**
     * RecupReservationByClient constructor.
     * @param $recupHandler
     */
    public function __construct(RecupReservationHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($id){
        $entitie = $this->recupHandler->handle($id);
        return $entitie;
    }
}