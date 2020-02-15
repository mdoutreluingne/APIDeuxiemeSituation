<?php


namespace App\Controller;


use App\Operation\RecupCountPhotosHandler;
use App\Operation\RecupCountSalleHandler;

class RecupCountPhotos
{
    private $recupHandler;
    /**
     * RecupCountPhotos constructor.
     * @param $recupHandler
     */
    public function __construct(RecupCountPhotosHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}