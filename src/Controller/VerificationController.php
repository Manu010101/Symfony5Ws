<?php

namespace App\Controller;

use App\Soap\Intervalle;
use App\Soap\SoapOperations;
use Symfony\Component\Routing\Annotation\Route;

class VerificationController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @Route("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(SoapOperations $soapOperations){
        $intervalle = new Intervalle('2022-07-10', '2022-07-15');
        dd($soapOperations->getCommandesByIntervalle($intervalle));
        return $this->render('base.html.twig', ['libelle' => $libelle]);
    }
}