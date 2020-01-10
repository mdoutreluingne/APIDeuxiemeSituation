<?php


namespace App\Operation;


use Doctrine\Persistence\ManagerRegistry;

class RecupReservationHandler
{
    protected $em;
    /**
     * RecupReservationHandler constructor.
     * @param ManagerRegistry $em
     */
    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }
    public function handle($id){

        return $this->em->getRepository('App:Reservation')->findByClient($id);
    }
}