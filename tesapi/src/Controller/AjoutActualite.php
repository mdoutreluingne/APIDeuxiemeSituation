<?php


namespace App\Controller;

use App\Operation\AddActualiteHandler;

class AjoutActualite
{
    private $recupHandler;
    /**
     * AjoutActualite constructor.
     * @param $recupHandler
     */
    public function __construct(AddActualiteHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($titre, $paragraphe, $datedebut, $datefin, $image){
        $entitie = $this->recupHandler->handle($titre, $paragraphe, $datedebut, $datefin, $image);
        return $entitie;
    }
}