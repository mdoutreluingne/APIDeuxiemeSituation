<?php

namespace App\Controller;

use App\Entity\Client;
use App\Operation\SoldeByIdHandler;

class SoldeById
{
    private $soldeHandler;
    /**
     * SoldeByIdHandler constructor.
     * @param $soldeHandler
     */
    public function __construct(SoldeByIdHandler $soldeHandler)
    {
        $this->soldeHandler = $soldeHandler;
    }
    public function __invoke($id){
        $entitie = $this->soldeHandler->handle($id);
        return $entitie;
    }
}