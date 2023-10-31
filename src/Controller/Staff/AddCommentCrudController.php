<?php

namespace App\Controller\Staff;

use App\Entity\AddComment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AddCommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AddComment::class;
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
