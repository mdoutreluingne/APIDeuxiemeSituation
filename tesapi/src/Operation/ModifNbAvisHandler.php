<?php


namespace App\Operation;


use Doctrine\Persistence\ManagerRegistry;

class ModifNbAvisHandler
{
    protected $em;
    /**
     * RecupAvisHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle($nombre){
        return $this->em->getRepository('App:Configuration')->updateNombreAvis($nombre);
    }
}