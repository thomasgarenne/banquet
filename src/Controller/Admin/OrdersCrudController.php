<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\IndexTrait;
use App\Entity\Orders;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OrdersCrudController extends AbstractCrudController
{
    use IndexTrait;

    public static function getEntityFqcn(): string
    {
        return Orders::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            NumberField::new('number'),
            TextField::new('time'),
            DateField::new('dates'),
            TextField::new('notes'),
            ArrayField::new('relation')
                ->onlyOnIndex()
        ];
    }
}
