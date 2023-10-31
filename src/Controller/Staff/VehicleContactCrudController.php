<?php

namespace App\Controller\Staff;

use App\Entity\VehicleContact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VehicleContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VehicleContact::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
