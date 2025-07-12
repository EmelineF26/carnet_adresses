<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;

class ModifierContactController extends AbstractController
{
    /**
    * 
    */
    #[Route('/modifier_contact', name: 'modifier_contact')]
    public function index(ContactRepository $rep): Response
    {
        $contacts = $rep->findAll();
        $data = ['contacts' => $contacts];
        return $this->render('modifier_contact/index.html.twig', $data);
    }
    /**
    *
    */
    #[Route('/{id}/modContact', name: 'modContact', methods: ['GET','POST'])]
    public function modification(Request $request, Contact $contact, PersistenceManagerRegistry $doctrine)
    {
//        $moncontact = $contact->find($id);
//        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        //Récupérer les données du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
//            $this->getDoctrine()->getManager()->flush();
            $em = $doctrine->getManager();
            $em->persist($contact);
            $em->flush();
            //Rediriger vers l'accueil une fois le formulaire saisi et enregistré
            return $this->redirectToRoute('affichage_contact');
        }
        return $this->render('contact/edit.html.twig', ['contact' => $contact, 'form' => $form->createView(),]);
    }
}