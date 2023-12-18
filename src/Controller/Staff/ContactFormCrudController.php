<?php

namespace App\Controller\Staff;

use App\Entity\ContactForm;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class ContactFormCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactForm::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable('new', 'edit'); // supprime le boutton add et edit

    }

    public function configureFields(string $pageName): iterable
    {
        return [
            'firstname',
            'lastname',
            'email',
            'phoneNumber',
            TextEditorField::new('message'),
            DateTimeField::new('contactDateTime'),
        ];
    }
}
