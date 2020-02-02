<?php


namespace App\Controller;


use App\Operation\RecupThemesHandler;

class RecupThemes
{
    private $recupHandler;
    /**
     * RecupThemes constructor.
     * @param $recupHandler
     */
    public function __construct(RecupThemesHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}