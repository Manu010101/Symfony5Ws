<?php

namespace App\Soap;

use App\Entity\Categorie;
use App\Entity\Commande;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class SoapOperations
 * @package App\Soap
 */
class SoapOperations
{
    private $doct;

    /**
     * SoapOperations constructor.
     * @param ManagerRegistry $doct
     */
    public function __construct(ManagerRegistry $doct)
    {
        $this->doct = $doct;
    }

    /**
     * Dis "Hello" à la personne passée en paramètre
     * @param string $name Le nom de la personne à qui dire "Hello!"
     * @return string The hello string
     */
    public function sayHello(string $name) : string
    {
        return 'Hello '.$name.'!';
    }

    /**
     * Réalise la somme de deux entiers
     * @param int $a 1er nombre
     * @param int $b 2ème nombre
     * @return int La somme des deux entiers
     */
    public function sumHello(int $a, int $b) : int {
        return (int)($a+$b);
    }

    /**
     * @param float $a
     * @param float $b
     * @param float $c
     * @return float
     */
    public function sumFloats(float $a, float $b, float $c) : float {
        return (float)($a+$b+$c);
    }

    /**
     * Méthode qui renvoie les ids des catégories disponibles
     * @return array
     */
    public function getCategorieIds(){
          $categories = $this->doct->getRepository(Categorie::class)->findAll();
          $categorieIds = [];
          foreach ($categories as $categorie){
              $categorieIds[] = $categorie->getId();
          }
          return $categorieIds;
    }

    /**
     * Méthode qui admet comme paramètre un objet catégorie vide (à l'exception de l'id) issu du client, cherche l'objet
     * correspondant dans la base de données côté serveur et le renvoie
     * @param \App\Soap\CategorieSoap $categorie
     * @return \App\Soap\CategorieSoap|null
     */
    public function getCategorieLibelle($categorie) : ?CategorieSoap{
        // faire l'appel sans utiliser les getters et setters, c'est ça qui pose pb
        $categorieBD = $this->doct->getRepository(Categorie::class)->find($categorie->id);

        if ($categorieBD){
            return new CategorieSoap(
                $categorieBD->getId(),
                $categorieBD->getLibelle(),
                $categorieBD->getTexte()
            );
        }

        return null;


    }


    /**
     * @param integer $id
     * @return \App\Soap\UserSoap
     */
    public function getUserById($id) : UserSoap{
        $user = $this->doct->getRepository(User::class)->find($id);
        return new UserSoap(
            $user->getId(),
            $user->getEmail(),
            $user->getNom(),
            $user->getPrenom()
        );
    }

    /**
     * @param \App\Soap\Intervalle
     * @return array(\App\Soap\CommandeSoap)
     */
    public function getCommandesByIntervalle($intervalle){
        $commandes = $this->doct->getRepository(Commande::class)->findByIntervalle($intervalle);
        $commandesSoap = [];

        foreach ($commandes as $commande){
            $commandesSoap[] = new CommandeSoap(
                $commande->getId(),
                $commande->getDateCommande()->format('Y.m.d'),
                $commande->getStatut(),
                new UserSoap(
                    $commande->getUser()->getId(),
                    $commande->getUser()->getEmail(),
                    $commande->getUser()->getNom(),
                    $commande->getUser()->getPrenom()
                )
            );
        }

        return $commandesSoap;
    }


}


