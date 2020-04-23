<?php


namespace App\Controller;


use App\Operation\ModifAvisHandler;
use Symfony\Component\HttpFoundation\Request;

class ModifAvis
{
    private $recupHandler;
    /**
     * ModifNbAvis constructor.
     * @param $recupHandler
     */
    public function __construct(ModifAvisHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(Request $request){
        $resu = json_decode($request->getContent(),true);
        $entitie = $this->recupHandler->handle($resu['nbcommentaire'], $resu['nbavis'], $resu['notemini']);
        return $entitie;
    }
}