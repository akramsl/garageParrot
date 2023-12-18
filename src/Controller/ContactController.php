<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/contact', name: 'contact')]
    public function index(Request $request): Response
    {
        $contact = new ContactForm();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupere les données du formulaire
            $formData = $form->getData();

            // Si la date est null renvoi la date actuel
            if ($formData->getContactDateTime() === null) {
                $formData->setContactDateTime(new \DateTime());
            }

            // Enregistrement en base de donnée
            $this->entityManager->persist($formData);
            $this->entityManager->flush();

            // Redirection et affichage d'un message de succès
            return $this->redirectToRoute('contact_success');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/contact/success', name: 'contact_success')]
    public function success(): Response
    {
        return $this->render('contact/success.html.twig');
    }
}
