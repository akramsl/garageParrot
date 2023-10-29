<?php

namespace App\Controller\Admin;

use App\Entity\Staff;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class StaffCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Staff::class;
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions 
            ->disable('new'); //Supression du bouton add
    }
    
    /*public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('title'),
    
        ];
    }*/
    
}
