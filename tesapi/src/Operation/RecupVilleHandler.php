<?php


namespace App\Operation;


use Doctrine\Persistence\ManagerRegistry;

class RecupVilleHandler
{
    protected $em;
    /**
     * RecupVilleHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle($nom){
        return $this->em->getRepository('App:Ville')->getVilleByNom($nom);
    }
}