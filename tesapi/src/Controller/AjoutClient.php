<?php


namespace App\Controller;

use App\Operation\AjoutClientHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;@Route::class;

class AjoutClient
{
    private $recupHandler;
    /**
     * AjoutClient constructor.
     * @param $recupHandler
     */
    public function __construct(AjoutClientHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(Request $request){
        $resu = json_decode($request->getContent(),true);
        $entitie = $this->recupHandler->handle($resu['nom'], $resu['prenom'], $resu['ville'],
            $resu['tel'], $resu['mail'], $resu['archive']);
        return $entitie;
    }
}