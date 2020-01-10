<?php


namespace App\Operation;


use Doctrine\Persistence\ManagerRegistry;

class ModifAvisHandler
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
    public function handle($nbcommentaire, $nbavis, $notemini){
        return $this->em->getRepository('App:Configuration')->updateNombreAvis($nbcommentaire, $nbavis, $notemini);
    }
}