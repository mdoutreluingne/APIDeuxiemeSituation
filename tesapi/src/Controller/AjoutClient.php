<?php


namespace App\Controller;

use App\Entity\Client;
use App\Operation\AjoutClientHandler;

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
    public function __invoke($nom, $prenom, $ville, $tel, $mail, $archive){
        $mail = str_replace(",",".",$mail);
        return $this->recupHandler->handle($nom, $prenom, $ville, $tel, $mail, $archive);
    }
}