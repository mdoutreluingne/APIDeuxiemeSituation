<?php


namespace App\Operation;


use Doctrine\Persistence\ManagerRegistry;

class RecupCountSalleHandler
{
    protected $em;
    /**
     * RecupCountSalleHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle(){
        return $this->em->getRepository('App:Salle')->CountSalles();
    }
}