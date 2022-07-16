<?php

namespace App\Service;

class CommandeService
{
    /**
     * @param integer
     * @return \App\Entity\Commande
     */
    public function getCommande($id){
        $commande = $this->doct->getRepository(Commande::class)->find($id);
        return $commande;
    }
}