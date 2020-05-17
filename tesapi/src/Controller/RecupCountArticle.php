<?php


namespace App\Controller;


use App\Operation\RecupCountArticleHandler;

class RecupCountArticle
{
    private $recupHandler;
    /**
     * RecupCountArticle constructor.
     * @param $recupHandler
     */
    public function __construct(RecupCountArticleHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke(){
        $entitie = $this->recupHandler->handle();
        return $entitie;
    }
}