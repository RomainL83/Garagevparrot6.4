<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use NumberFormatter;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id', 'Identifiant')->setFormTypeOptions(['disabled' => true]);
        yield TextField::new('brand', 'Marque');
        yield TextField::new('model', 'Modèle');
        yield NumberField::new('year', 'Année')->setNumberFormat('%d');
        yield NumberField::new('price', 'Prix')
            ->formatValue(fn ($val) => (new NumberFormatter('fr_FR', NumberFormatter::CURRENCY))->formatCurrency($val, 'EUR'));
        yield NumberField::new('kilometer', 'Kilométrage');
        yield TextField::new('distribution', 'Distribution');
        yield TextField::new('fuel', 'Carburant');
        yield ImageField::new('illustration', 'Illustration')
        ->setBasePath('/img') 
        ->setUploadDir('public/img/cars') 
        ->setUploadedFileNamePattern('[randomhash].[extension]')
        ->setRequired(false);
        yield DateField::new('createdAt', 'Date de création')->setFormTypeOptions(['disabled' => true]);
        yield DateField::new('updatedAt', 'Date de mise à jour')
            ->hideOnForm(); 
        yield DateField::new('deletedAt', 'Date de suppression')
            ->hideOnIndex(); 
            yield AssociationField::new('addedBy', 'Ajouté par')
    ->setRequired(true);
    }
}
