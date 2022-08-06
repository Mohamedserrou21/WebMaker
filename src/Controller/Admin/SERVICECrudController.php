<?php

namespace App\Controller\Admin;

use App\Entity\SERVICE;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SERVICECrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SERVICE::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            ImageField::new('image')
                ->SetBasePath($this->getParameter("app.path.product_images"))
                ->onlyOnIndex(),

            TextareaField::new('imageFile')
                ->hideOnIndex()
                ->setFormTypeOption(

                    'allow_delete',
                    false,

                )
                ->setFormType(VichImageType::class),

            TextareaField::new('context'),
            DateField::new('updatedAt'),
        ];
    }
}
