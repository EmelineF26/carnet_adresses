<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupprimerContactController extends AbstractController
{
    /**
    * 
    */
    #[Route('/supprimer_contact', name: 'supprimer_contact')]
    public function index(): Response
    {
        return $this->render('supprimer_contact/index.html.twig', ['controller_name' => 'SupprimerContactController',]);
    }
}