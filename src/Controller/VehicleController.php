<?php

namespace App\Controller;

use App\Entity\VehicleContact;
use App\Entity\VehicleListing;
use App\Form\VehicleContactType;
use App\Form\VehicleFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class VehicleController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/vehicules', name: 'vehicules')]
    public function index(Request $request): Response
    {
        // Filtre de brand suivant ce qui est dispo dans l'entity
        $brands = $this->entityManager->getRepository(VehicleListing::class)->findDistinctBrands();

        // Création du formulaire
        $form = $this->createForm(VehicleFormType::class, null, ['brands' => $brands]);
        $form->handleRequest($request);

        $criteria = [];

        if ($form->isSubmitted() && $form->isValid()) {
            // Utilisation des méthodes get pour acceder aux données du formulaire
            $brand = $form->get('brand')->getData();
            $fuel = $form->get('fuel')->getData();
            $gearbox = $form->get('gearbox')->getData();

            // Ajoute les critères seulement si ils sont définis
            if ($brand) {
                $criteria['brand'] = $brand;
            }

            if ($fuel) {
                $criteria['fuel'] = $fuel;
            }

            if ($gearbox) {
                $criteria['gearbox'] = $gearbox;
            }
        }

        $vehicles = $this->entityManager->getRepository(VehicleListing::class)->findBy($criteria);

        return $this->render('vehicle/index.html.twig', [
            'controller_name' => 'VehicleController',
            'vehicles' => $vehicles,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/vehicules/{id}', name: 'vehicle_detail')]
    public function detail($id, Request $request): Response
    {
        $vehicle = $this->entityManager->getRepository(VehicleListing::class)->find($id);

        if (!$vehicle) {
            throw $this->createNotFoundException('Véhicule non trouvé');
        }

        $pictures = $vehicle->getVehiclePictures();

        $contact = new VehicleContact();
        $contact->setUrl($this->generateUrl('vehicle_detail', ['id' => $id], UrlGeneratorInterface::ABSOLUTE_URL));
        $form = $this->createForm(VehicleContactType::class, $contact);

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

        return $this->render('vehicle/detail.html.twig', [
            'vehicle' => $vehicle,
            'pictures' => $pictures,
            'form' => $form->createView(),
        ]);
    }
}
