<?php


namespace App\Operation;


use Doctrine\Persistence\ManagerRegistry;

class AddActualiteHandler
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
    public function handle($titre, $paragraphe, $datedebut, $datefin, $image){
        return $this->em->getRepository('App:Actualite')->addActu($titre, $paragraphe, $datedebut, $datefin, $image);
    }
}