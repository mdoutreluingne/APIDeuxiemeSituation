<?php


namespace App\Operation;


use Doctrine\Persistence\ManagerRegistry;

class RecupObstacleHandler
{
    protected $em;
    /**
     * RecupObstacleHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle($id){
        return $this->em->getRepository('App:Obstacle')->findByReservation($id);
    }
}