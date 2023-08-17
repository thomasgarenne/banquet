<?php

namespace App\Controller\Admin;

use App\Entity\Plates;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlatesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plates::class;
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
