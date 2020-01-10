<?php


namespace App\Controller;


use App\Operation\ModifAvisHandler;

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
    public function __invoke($nbcommentaire, $nbavis, $notemini){
        $entitie = $this->recupHandler->handle($nbcommentaire, $nbavis, $notemini);
        return $entitie;
    }
}