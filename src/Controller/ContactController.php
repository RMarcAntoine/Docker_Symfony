<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données soumises dans le formulaire
            $Name = $form->get('Name')->getData();
            $Email = $form->get('Email')->getData();
            $Subject = $form->get('Subject')->getData();
            $Message = $form->get('Message')->getData();

            // Créer une nouvelle instance de l'entité Contact et définir les valeurs
            $contact = new Contact();
            $contact->setName($Name);
            $contact->setEmail($Email);
            $contact->setSubject($Subject);
            $contact->setMessage($Message);

            // Sauvegarder l'entité dans la base de données
            $entityManager->persist($contact);
            $entityManager->flush();

            // Rediriger l'utilisateur vers une page de confirmation ou autre
            // Par exemple, vers la page d'accueil après la soumission réussie.
            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}