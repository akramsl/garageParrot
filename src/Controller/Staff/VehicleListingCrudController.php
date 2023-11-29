<?php

namespace App\Controller\Staff;

use App\Entity\VehicleListing;
use App\Form\Type\VehiclePictureType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VehicleListingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VehicleListing::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $fuelList = [
            'Essence' => 'Essence',
            'Diesel' => 'Diesel',
            'Hybride' => 'Hybride',
            'Electrique' => 'Electrique',
            'GPL' => 'GPL',
            'Autre' => 'Autre'
        ];



        
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('brand'),
            TextField::new('model'),
            IntegerField::new('year'),
            IntegerField::new('mileage')->setThousandsSeparator(' '),
            ChoiceField::new('fuel')->setChoices($fuelList),
            ChoiceField::new('gearbox')->setChoices([
                'Manuelle' => 'Manuelle',
                'Automatique' => 'Automatique'
                ])
                ->renderExpanded(true)
                ->allowMultipleChoices(false),
            IntegerField::new('power'),
            IntegerField::new('horse_power'),
            IntegerField::new('price')->setThousandsSeparator(' '),
            CollectionField::new('vehiclePictures')
                ->setEntryType(VehiclePictureType::class),
            TextEditorField::new('description')
        ];
    }
    
}
