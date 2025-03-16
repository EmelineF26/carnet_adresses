<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;

class AjoutContactController extends AbstractController
{
    /**
    * 
    */
    #[Route('/ajout_contact', name: 'ajout_contact')]
    public function NewContact(Request $request, EntityManagerInterface $entityManager): Response
    {
        //Création du formulaire
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        //Récupérer les données du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            //Enregistrer les données du contact dans la BDD
            $contact = $form->getData();
            $entityManager->persist($contact);
            $entityManager->flush();
            //Rediriger vers l'accueil une fois le formulaire saisi et enregistré
            return $this->redirectToRoute('hello');
        }
        return $this->render('ajout_contact/index.html.twig', array('form'=> $form->createView()));
    }
}