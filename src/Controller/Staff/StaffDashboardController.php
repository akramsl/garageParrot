<?php

namespace App\Controller\Staff;

use App\Entity\AddComment;
use App\Entity\VehicleContact;
use App\Entity\VehicleListing;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaffDashboardController extends AbstractDashboardController
{
    #[Route('/staff', name: 'staff')]
    public function index(): Response
    {
        return $this->render('staff/staffDashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('GarageParrot');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Commentaire', 'fa-solid fa-comments', AddComment::class);
        yield MenuItem::linkToCrud('Véhicules', 'fa-solid fa-car-rear', VehicleListing::class);
        yield MenuItem::linkToCrud('Conctacte du véhicule ', 'fa-solid fa-envelope-circle-check', VehicleContact::class);
    }
}
