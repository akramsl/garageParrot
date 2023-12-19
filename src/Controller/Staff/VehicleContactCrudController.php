<?php

namespace App\Controller\Staff;

use App\Entity\VehicleContact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class VehicleContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VehicleContact::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable('new', 'edit');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstname')->setLabel('Prénom'),
            TextField::new('lastname')->setLabel('Nom'),
            EmailField::new('email')->setLabel('Email'),
            IntegerField::new('phoneNumber')->setLabel('Numéro de téléphone'),
            TextEditorField::new('message')->setLabel('Message'),
            DateTimeField::new('contactDateTime')->setLabel('Reçu le :'),
            UrlField::new('url')->setLabel('Lien du véhicule'),
        ];
    }
}
