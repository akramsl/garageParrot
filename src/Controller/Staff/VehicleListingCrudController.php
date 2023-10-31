<?php

namespace App\Controller\Staff;

use App\Entity\VehicleListing;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VehicleListingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VehicleListing::class;
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
