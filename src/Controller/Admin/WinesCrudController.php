<?php

namespace App\Controller\Admin;

use App\Entity\Wines;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WinesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Wines::class;
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
