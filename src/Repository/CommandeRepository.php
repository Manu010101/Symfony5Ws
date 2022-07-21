<?php

namespace App\Repository;

use App\Entity\Commande;
use App\Soap\IntervalleSoap;
use Doctrine\Persistence\ManagerRegistry;

class CommandeRepository extends \Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    /**
     * Récupère une commande passée dans un intervalle de temps donné
     * @param $intervalle
     * @return float|int|mixed|string
     */
    public function findByIntervalle($intervalle): mixed
    {
        $debut = $intervalle->debut;
        $fin = $intervalle->fin;

        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCommande >= :debut and c.dateCommande <= :fin')
            ->setParameter('debut', $debut)
            ->setParameter('fin', $fin);

        $query = $qb->getQuery();

        return $query->execute();
    }
}