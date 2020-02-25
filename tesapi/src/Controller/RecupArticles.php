<?php


namespace App\Controller;


use App\Operation\RecupArticlesHandler;

class RecupArticles
{
    private $recupHandler;
    /**
     * RecupArticles constructor.
     * @param $recupHandler
     */
    public function __construct(RecupArticlesHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}