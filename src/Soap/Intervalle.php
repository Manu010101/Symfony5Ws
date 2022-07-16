<?php

namespace App\Soap;

class Intervalle
{
    /**
     * @var string
     */
    public $debut;

    /**
     * @var string
     */
    public $fin;

    /**
     * @param string $debut
     * @param string $fin
     */
    public function __construct($debut, $fin)
    {
        $this->debut = $debut;
        $this->fin = $fin;
    }

    /**
     * @return string
     */
    public function getDebut(): string
    {
        return $this->debut;
    }

    /**
     * @return string
     */
    public function getFin(): string
    {
        return $this->fin;
    }

    /**
     * @param string $debut
     */
    public function setDebut($debut): void
    {
        $this->debut = $debut;
    }

    /**
     * @param string $fin
     */
    public function setFin($fin): void
    {
        $this->fin = $fin;
    }






}