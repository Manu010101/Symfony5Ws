<?php

namespace App\Soap;

class CommandeSoap
{
    /**
     * @var integer
     */
    public $id;
    /**
     * @var string
     */
    public $date_commande;
    /**
     * @var string
     */
    public $statut;
    /**
     * @var \App\Soap\UserSoap
     */
    public $user;

    /**
     * @param int $id
     * @param string $date_commande
     * @param string $statut
     * @param \App\Soap\UserSoap $user
     */
    public function __construct($id, $date_commande, $statut, $user)
    {
        $this->id = $id;
        $this->date_commande = $date_commande;
        $this->statut = $statut;
        $this->user = $user;
    }


}