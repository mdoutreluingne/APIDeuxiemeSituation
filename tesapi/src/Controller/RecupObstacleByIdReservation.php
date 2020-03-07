<?php


namespace App\Controller;


use App\Operation\RecupObstacleHandler;

class RecupObstacleByIdReservation
{
    private $recupHandler;
    /**
     * RecupObstacleByIdReservation constructor.
     * @param $recupHandler
     */
    public function __construct(RecupObstacleHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($id){
        $entitie = $this->recupHandler->handle($id);
        return $entitie;
    }
}