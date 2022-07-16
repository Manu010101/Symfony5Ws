<?php

namespace App\Soap;

class UserSoap
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $nom;

    /**
     * @var string
     */
    public $prenom;

    /**
     * @param integer $id
     * @param string $email
     * @param string $nom
     * @param string $prenom
     */
    public function __construct($id, $email, $nom, $prenom)
    {
        $this->id = $id;
        $this->email = $email;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }



}