<?php

namespace App\Soap;

use App\Entity\Categorie;
use App\Entity\Commande;
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

//    /**
//     * @param integer
//     * @return \App\Entity\Commande
//     */
//    public function getCommandeByDate($id){
//        $commande = $this->doct->getRepository(Commande::class)->find($id);
//        dd($commande);
//        return $commande;
//    }

}


