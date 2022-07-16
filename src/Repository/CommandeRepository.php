<?php

namespace App\Repository;

use App\Entity\Commande;
use App\Soap\Intervalle;

class CommandeRepository extends \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }


    public function trouveParIntervalle(Intervalle $intervalle)
    {
        $debut = $intervalle->getDebut();
        $fin = $intervalle->getFin();

        $qb = $this->createQueryBuilder('c')
            ->where('c.date_commande >= :debut and c.date_commande <= :fin')
            ->setParameter('debut', $debut)
            ->setParameter('fin', $fin);

        $query = $qb->getQuery();

        return $query->execute();
    }
}