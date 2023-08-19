<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\IndexTrait;
use App\Entity\Wines;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WinesCrudController extends AbstractCrudController
{
    use IndexTrait;

    public static function getEntityFqcn(): string
    {
        return Wines::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),
            TextField::new('slug'),
            TextField::new('domain'),
            NumberField::new('year'),
            ArrayField::new('grappes'),
            ArrayField::new('category')
                ->onlyOnIndex()
        ];
    }
}
