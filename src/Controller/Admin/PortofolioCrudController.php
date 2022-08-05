<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use App\Entity\Portofolio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PortofolioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Portofolio::class;
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

            TextField::new('demo'),
            DateField::new('updatedAt'),
        ];
    }
}
