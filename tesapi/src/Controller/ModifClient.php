<?php


namespace App\Controller;


use App\Operation\ModifClientHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;@Route::class;

class ModifClient
{
    private $modifHandler;
    /**
     * ModifClient constructor.
     * @param $modifHandler
     */
    public function __construct(ModifClientHandler $modifHandler)
    {
        $this->modifHandler = $modifHandler;
    }
    public function __invoke(Request $request){
        $resu = json_decode($request->getContent(),true);
        $entitie = $this->modifHandler->handle($resu['id'], $resu['nom'], $resu['prenom'], $resu['ville'],
            $resu['tel'], $resu['mail'], $resu['archive']);
        return $entitie;
    }
}