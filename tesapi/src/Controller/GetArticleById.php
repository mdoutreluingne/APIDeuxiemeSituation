<?php
namespace App\Controller;


use App\Operation\ArticleByIdHandler;

class GetArticleById
{
    private $recupHandler;
    /**
     * ModifNbAvis constructor.
     * @param $recupHandler
     */
    public function __construct(ArticleByIdHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($id){
        return $this->recupHandler->handle($id);
    }
}