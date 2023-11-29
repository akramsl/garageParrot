<?php

namespace App\Controller;

use App\Entity\VehicleListing;
use App\Entity\VehiclePicture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/vehicules', name: 'vehicules')]
    public function index(): Response
    {
        $vehicles = $this->entityManager->getRepository(VehicleListing::class)->findAll();

        return $this->render('vehicle/index.html.twig', [
            'controller_name' => 'VehicleController',
            'vehicles' => $vehicles,
        ]);
    }

    #[Route('/vehicules/{id}', name: 'vehicle_detail')]
    public function detail($id): Response
    {
        $vehicle = $this->entityManager->getRepository(VehicleListing::class)->find($id);

        
        if (!$vehicle) {
            throw $this->createNotFoundException('Véhicule non trouvé');
        }

        $pictures = $vehicle->getVehiclePictures() ;

        return $this->render('vehicle/detail.html.twig', [
            'vehicle' => $vehicle,
            'pictures' => $pictures,
        ]);
    }
}
