<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * LigneCommande
 * @ApiResource
 * @ORM\Table(name="ligne_commande", indexes={@ORM\Index(name="IDX_3170B74BF347EFB", columns={"produit_id"}), @ORM\Index(name="IDX_3170B74B9AF8E3A3", columns={"id_commande_id"})})
 * @ORM\Entity
 */
class LigneCommande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande", inversedBy="ligneCommande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commande_id", referencedColumnName="id")
     * })
     */
    private $idCommande;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="ligneCommande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produit_id", referencedColumnName="id")
     * })
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdCommande(): ?Commande
    {
        return $this->idCommande;
    }

    public function setIdCommande(?Commande $idCommande): self
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }


}
