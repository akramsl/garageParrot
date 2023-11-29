<?php

namespace App\Controller\Staff;

use App\Entity\VehiclePicture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VehiclePictureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VehiclePicture::class;
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
