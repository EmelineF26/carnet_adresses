<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\ContactRepository;

class ContactController extends AbstractController
{
    /**
    * 
    */
    #[Route('/affichage_contact', name: 'affichage_contact')]
    public function index(ContactRepository $rep)
    {
        $contacts = $rep->findAll();
        $data = ['contacts' => $contacts];
        $rep = $this->render('contact/index.html.twig', $data);
        return $rep;
    }
}