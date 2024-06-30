<?php

namespace App\Controller\Admin;

use App\Entity\CompanySchedule;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CompanyScheduleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CompanySchedule::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityPermission('ROLE_ADMIN');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('day', 'Jour')->setFormType(ChoiceType::class)->setFormTypeOptions([
                'choices' => [
                    'Lundi' => 'lundi',
                    'Mardi' => 'mardi',
                    'Mercredi' => 'mercredi',
                    'Jeudi' => 'jeudi',
                    'Vendredi' => 'vendredi',
                    'Samedi' => 'samedi',
                    'Dimanche' => 'dimanche',
                ],
                'placeholder' => 'Sélectionner un jour',
                'required' => true,
            ]),
            TimeField::new('startMorning', 'Début matin')->setFormat('HH:mm'),
            TimeField::new('endMorning', 'Fin matin')->setFormat('HH:mm'),
            TimeField::new('startAfternoon', 'Début après-midi')->setFormat('HH:mm'),
            TimeField::new('endAfternoon', 'Fin après-midi')->setFormat('HH:mm'),
        ];
    }
}
