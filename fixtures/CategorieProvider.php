<?php

namespace AppBundle\DataFixtures\Faker\Provider;

class CategorieProvider
{
    public static function categorie(): string
    {
        $names = array(
            'Fruits',
            'Légumes',
            'Drogues',
            'Armes',
            'Alcools',
            'Fromages',
            'Voitures',
            'Films',
        );

        return $names[array_rand($names)];
    }
}