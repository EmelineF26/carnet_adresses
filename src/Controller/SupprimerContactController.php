<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\ContactRepository;

class SupprimerContactController extends AbstractController
{
    /**
    * 
    */
    #[Route('/supprimer_contact', name: 'supprimer_contact')]
    public function index(ContactRepository $rep): Response
    {
        $contacts = $rep->findAll();
        $data = ['contacts' => $contacts];
        return $this->render('supprimer_contact/index.html.twig', $data);
    }
}