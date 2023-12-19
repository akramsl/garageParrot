<?php

namespace App\Controller;

use App\Entity\AddComment;
use App\Form\AddCommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddCommentController extends AbstractController
{
    #[Route('/add/comment', name: 'add_comment')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new AddComment();

        $form = $this->createForm(AddCommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setPostDate(new \DateTime()); // Retourne la date du jour

            $entityManager->persist($comment);
            $entityManager->flush();

            // message de succès
            $this->addFlash('success', 'Le commentaire a bien été envoyé.');

            // redirection vers la page d'acceuil
            return $this->redirectToRoute('acceuil');
        }

        return $this->render('add_comment/index.html.twig', [
            'controller_name' => 'AddCommentController',
            'form' => $form->createView(),
        ]);
    }
}
