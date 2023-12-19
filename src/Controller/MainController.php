<?php

namespace App\Controller;

use App\Entity\AddComment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'acceuil')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $comments = $entityManager->getRepository(AddComment::class)->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'comments' => $comments
        ]);
    }
}
