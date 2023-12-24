<?php

namespace App\Controller\Staff;

use App\Entity\AddComment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AddCommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AddComment::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Nom complet'),
            TextEditorField::new('comment')->setLabel('Commentaire'),
            IntegerField::new('rating')->setLabel('Note'),
            DateTimeField::new('postDate')
                ->setLabel('Reçu le :')
                ->setFormat('dd-MM-yyyy')
        ];
    }

}
