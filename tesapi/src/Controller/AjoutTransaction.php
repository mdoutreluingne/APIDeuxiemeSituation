<?php


namespace App\Controller;

use App\Entity\Transaction;
use App\Operation\AjoutTransactionHandler;

class AjoutTransaction
{
    private $recupHandler;
    /**
     * AjoutTransaction constructor.
     * @param $recupHandler
     */
    public function __construct(AjoutTransactionHandler $recupHandler)
    {
        $this->recupHandler = $recupHandler;
    }
    public function __invoke($date, $montant, $type, $numero, $commentaire, $reservation, $client){
        $montant = str_replace(",",".",$montant);
        $numero = ($numero === " ")?null:$numero;
        $reservation = ($reservation === " ")?null:$reservation;
        return $this->recupHandler->handle($date, $montant, $type, $numero, $commentaire, $reservation, $client);
    }
}