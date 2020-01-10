<?php


namespace App\Operation;
use Doctrine\Persistence\ManagerRegistry;

class SoldeByIdHandler
{
    protected $em;
    /**
     * SoldeByIdHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle($id){
        return $this->em->getRepository('App:Client')->findSolde($id);
    }
}