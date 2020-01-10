<?php


namespace App\Operation;
use Doctrine\Persistence\ManagerRegistry;

class RecupAvisHandler
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
    public function handle($theme){
        $thetheme = $this->em->getRepository('App:Theme')->findOneByNom($theme);
        $thesalle = $this->em->getRepository('App:Salle')->findOneBytheme($thetheme);
        return $this->em->getRepository('App:Avis')->findBysalle($thesalle);
    }
}