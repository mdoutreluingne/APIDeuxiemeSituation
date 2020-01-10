<?php


namespace App\Controller;


use App\Operation\ModifNbAvisHandler;

class ModifNbAvis
{
    private $recupHandler;
    /**
     * ModifNbAvis constructor.
     * @param $recupHandler
     */
    public function __construct(ModifNbAvisHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($nombre){
        $entitie = $this->recupHandler->handle($nombre);
        return $entitie;
    }
}