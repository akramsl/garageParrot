<?php

namespace App\Controller\Admin;

use App\Entity\OpeningTime;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class OpeningTimeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningTime::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable('new', 'delete');
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('dayOfWeek')->setLabel('Jour de la semaine'),
            TimeField::new('openingTime')->setLabel('Heure d\'ouverture'),
            TimeField::new('closingTime')->setLabel('Heure de fermeture'),
            TextField::new('additionalInfo')->setLabel('Modification exeptionnelle'),
        ];
    }
    
}
