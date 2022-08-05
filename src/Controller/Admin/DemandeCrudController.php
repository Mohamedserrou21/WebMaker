<?php

namespace App\Controller\Admin;

use App\Entity\Demande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class DemandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Demande::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('societe'),
            TextField::new('fullname'),
            TextField::new('secteur'),
            TextField::new('ville'),
            AssociationField::new('service'),
            TextField::new('tele'),
            TextField::new('message'),
        ];
    }
}
