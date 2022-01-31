<?php

namespace App\Controller\Admin;

use App\Entity\Album;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Image;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AlbumCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Album::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            AssociationField::new('groupe'),
            NumberField::new('nbMorceaux'),
            DateField::new('dateSortie'),
            TextField::new('AfficheFile')
                ->setFormType(VichFileType::class,
                [ 'delete_label'=>'supprimer ?'])->onlyOnForms(),
            TextareaField::new('AfficheFile')
                ->setFormType(VichImageType::class)
                ->setLabel('Image')
                ->onlyOnForms(),
            ImageField::new('Affiche')->setBasePath('/img/album')->onlyOnDetail(),
            ImageField::new('Affiche')->setBasePath('/img/album')->onlyOnIndex(),

        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->setPermission(Action::NEW, 'ROLE_USER')
            ->setPermission(Action::DELETE, 'ROLE_ADMIN')
            ->setPermission(Action::EDIT, 'ROLE_ADMIN')
            ->setPermission(Action::BATCH_DELETE, 'ROLE_ADMIN')
            ->add(Crud::PAGE_INDEX, Action::DETAIL) ->setPermission(Action::DETAIL, 'ROLE_ADMIN')
            ;
    }

}
