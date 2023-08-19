<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\IndexTrait;
use App\Entity\Plates;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PlatesCrudController extends AbstractCrudController
{
    use IndexTrait;

    public static function getEntityFqcn(): string
    {
        return Plates::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),
            TextField::new('slug'),
            TextField::new('description'),
            NumberField::new('price'),
            CollectionField::new('images'),
            ArrayField::new('category')
                ->onlyOnIndex()
        ];
    }
}
