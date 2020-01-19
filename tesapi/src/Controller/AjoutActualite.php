<?php


namespace App\Controller;

use App\Entity\Actualite;
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
    public function __invoke($titre, $paragraphe, $dateDebut , $dateFin , $image){
        $dateDebut = new \DateTime($dateDebut);
        $dateFin = new \DateTime($dateFin);
        $entitie = $this->recupHandler->handle($titre, $paragraphe, $dateDebut, $dateFin, $image);
        return $entitie;
    }
}