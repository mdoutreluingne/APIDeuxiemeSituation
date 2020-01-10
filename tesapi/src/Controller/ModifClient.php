<?php


namespace App\Controller;


use App\Operation\ModifClientHandler;

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
    public function __invoke($id, $nom, $prenom, $ville, $tel, $mail, $archive){
        $entitie = $this->modifHandler->handle($id, $nom, $prenom, $ville, $tel, $mail, $archive);
        return $entitie;
    }
}