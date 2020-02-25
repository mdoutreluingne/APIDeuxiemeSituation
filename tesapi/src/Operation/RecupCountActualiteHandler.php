<?php


namespace App\Operation;


use Doctrine\Persistence\ManagerRegistry;

class RecupCountActualiteHandler
{
    protected $em;
    /**
     * RecupCountActualiteHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle(){
        return $this->em->getRepository('App:Actualite')->CountActualite();
    }
}