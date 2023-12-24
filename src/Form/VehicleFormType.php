<?php

namespace App\Form;

use App\Entity\VehicleListing;
use App\Repository\VehicleListingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleFormType extends AbstractType
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    private function getBrandsChoices(): array
    {
        // Récupére les marques à partir de l'entité VehicleListing
        // Utilise le repository pour obtenir les marques distinctes
        /** @var VehicleListingRepository $repository */
        $repository = $this->entityManager->getRepository(VehicleListing::class);
        $brands = $repository->findDistinctBrands();

        // Transforme les marques en un tableau associatif pour les choix du formulaire
        $choices = [];
        foreach ($brands as $brand) {
            $brandToUppercase = strtoupper($brand); // Récupère la marque en majuscules

            $choices[$brandToUppercase] = $brandToUppercase;
        }

        return $choices;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', ChoiceType::class, [
                'choices' => $this->getBrandsChoices(),
                'required' => false, // Permet une sélection vide
                'placeholder' => 'Sélectionnez une marque', // Texte par défaut pour la sélection vide
                'label' => 'Marque'
            ])
            ->add('fuel', ChoiceType::class, [
                'choices' => [
                    'Essence' => 'Essence',
                    'Diesel' => 'Diesel',
                    'Hybride' => 'Hybride',
                    'Electrique' => 'Electrique',
                    'GPL' => 'GPL',
                    'Autre' => 'Autre'

                ],
                'required' => false,
                'placeholder' => 'Sélectionnez le carburant',
                'label' => 'Carburant'
            ])
            ->add('gearbox', ChoiceType::class, [
                'choices' => [
                    'Automatique' => 'Automatique',
                    'Manuelle' => 'Manuelle',
                ],
                'required' => false,
                'placeholder' => 'Sélectionnez la boîte de vitesses',
                'label' => 'Boite de vitesse'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => VehicleListing::class,
            'brands' => null,
        ]);
    }
}
