<?php


namespace App\Controller;

use App\Entity\Transaction;
use App\Operation\AjoutTransactionHandler;
use Symfony\Component\HttpFoundation\Request;

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
    public function __invoke(Request $request){
        $resu = json_decode($request->getContent(),true);
        $montant = str_replace(",",".",$resu['montant']);
        $numero = ($resu['numero'] === " ")?null:$resu['numero'];
        $reservation = ($resu['reservation'] === " ")?null:$resu['reservation'];
        $entitie = $this->recupHandler->handle($resu['date'], $montant, $resu['type'],$numero,
            $resu['commentaire'], $reservation, $resu['client']);

        return $entitie;
    }
}