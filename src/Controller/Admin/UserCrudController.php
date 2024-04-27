<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use App\Entity\User;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityPermission('ROLE_ADMIN');
    }

    public function configureFields(string $pageName): iterable
    {
        if (Crud::PAGE_INDEX === $pageName) {
            yield IdField::new('id', label: 'identifiant')->setFormTypeOptions(['disabled' => true]);
        }
        yield AssociationField::new('company')
            ->setRequired(true) ->formatValue(fn(Company $c, User $e) => $c->getName());

        yield EmailField::new('email', 'Adresse email');
        yield TextField::new('firstName', 'Prénom');
        yield TextField::new('lastName', 'Nom');
        yield ArrayField::new('roles')
            ->setRequired(false); // Rendre non obligatoire
        yield ImageField::new('picture')
            ->setBasePath('/img')
            ->setUploadDir('public/img/team')
            ->setUploadedFileNamePattern('team/[name].[extension]');
        yield TextField::new('password', 'Mot de passe')
            ->setRequired(true) // Rendre obligatoire
            ->hideOnIndex(); // Cacher le mot de passe dans l'index
        yield TextField::new('companyFunction', 'Fonction dans l\'entreprise')
            ->setRequired(true); // Rendre obligatoire

        if (Crud::PAGE_INDEX === $pageName) {
            yield DateTimeField::new('createdAt', 'Date de création');
        }
    }
}
