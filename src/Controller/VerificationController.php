<?php

namespace App\Controller;

use App\Soap\IntervalleSoap;
use App\Soap\SoapOperations;
use Symfony\Component\Routing\Annotation\Route;

class VerificationController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @Route("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(SoapOperations $soapOperations){
        $intervalle = new IntervalleSoap('2022-07-10', '2022-07-15');
        dd($intervalle);
        dd($soapOperations->getCommandesByIntervalle($intervalle));
        return $this->render('base.html.twig', ['libelle' => $libelle]);
    }
}