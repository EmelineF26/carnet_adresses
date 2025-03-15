<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutContactController extends AbstractController
{
    /**
    * 
    */
    #[Route('/ajout_contact', name: 'ajout_contact')]
    public function index(): Response
    {
        return $this->render('ajout_contact/index.html.twig', ['controller_name' => 'AjoutContactController',]);
    }
}