<?php

namespace App\Controller\Admin;

use App\Entity\OpeningTime;
use App\Entity\Services;
use App\Entity\Staff;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AdminDashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        return $this->render('admin/adminDashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('GarageParrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Page d\'acceuil', 'fa-solid fa-house', 'acceuil');
        yield MenuItem::linkToRoute('Ajouter un employé', 'fa-solid fa-user-plus', 'app_register');
        yield MenuItem::linkToCrud('Services', 'fas fa-newspaper', Services::class);
        yield MenuItem::linkToCrud('Employés', 'fas fa-id-card', Staff::class);
        yield MenuItem::linkToCrud('Horaire', 'fas fa-hourglass-end', OpeningTime::class);
    }
}
