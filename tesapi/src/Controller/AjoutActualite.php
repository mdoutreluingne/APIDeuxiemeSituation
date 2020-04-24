<?php


namespace App\Controller;

use App\Entity\Actualite;
use App\Operation\AddActualiteHandler;
use Symfony\Component\HttpFoundation\Request;

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
    public function __invoke(Request $request){
        $resu = json_decode($request->getContent(),true);
        $datedebut = new \DateTime($resu['datedebut']);
        $datefin = new \DateTime($resu['datefin']);
        $entitie = $this->recupHandler->handle($resu['titre'], $resu['paragraphe'], $datedebut, $datefin, $resu['image']);
        return $entitie;
    }
}