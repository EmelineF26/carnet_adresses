<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifierContactController extends AbstractController
{
    /**
    * 
    */
    #[Route('/modifier_contact', name: 'modifier_contact')]
    public function index(): Response
    {
        return $this->render('modifier_contact/index.html.twig', ['controller_name' => 'ModifierContactController',]);
    }
}