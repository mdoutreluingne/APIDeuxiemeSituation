<?php


namespace App\Operation;

use Doctrine\Persistence\ManagerRegistry;

class AjoutTransactionHandler
{
    protected $em;
    /**
     * AjoutTransactionHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle($date, $montant, $type, $numero, $commentaire, $reservation, $client){
        return $this->em->getRepository('App:Transaction')->addTransaction($date, $montant, $type, $numero, $commentaire, $reservation, $client);
    }
}