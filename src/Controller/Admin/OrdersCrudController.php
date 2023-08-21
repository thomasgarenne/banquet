<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Traits\IndexTrait;
use App\Entity\Orders;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
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
            IdField::new('id')->hideOnForm(),
            NumberField::new('number'),
            TextField::new('time'),
            DateTimeField::new('dates'),
            TextField::new('notes')->setRequired(false),
            AssociationField::new('relation')
        ];
    }
}
