<?php

namespace App\Form;

use App\Entity\StoreHours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StoreHoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Définition d'un tableau associatif pour les noms des jours en français
        $days = [
            'monday' => 'lundi', 
            'tuesday' => 'mardi', 
            'wednesday' => 'mercredi', 
            'thursday' => 'jeudi', 
            'friday' => 'vendredi', 
            'saturday' => 'samedi', 
            'sunday' => 'dimanche'
        ];

        foreach ($days as $dayKey => $dayValue) {
            $builder
                ->add($dayKey . 'MorningOpen', TimeType::class, [
                    'label' => "Heure d'ouverture le matin ($dayValue)",
                    'required' => false,
                ])
                ->add($dayKey . 'MorningClose', TimeType::class, [
                    'label' => "Heure de fermeture le matin ($dayValue)",
                    'required' => false,
                ])
                ->add($dayKey . 'AfternoonOpen', TimeType::class, [
                    'label' => "Heure d'ouverture l'après-midi ($dayValue)",
                    'required' => false,
                ])
                ->add($dayKey . 'AfternoonClose', TimeType::class, [
                    'label' => "Heure de fermeture l'après-midi ($dayValue)",
                    'required' => false,
                ]);
        }

        // Ajouter un champ de sélection pour choisir le jour de fermeture
        $builder->add('closingDay', ChoiceType::class, [
            'choices' => array_combine($days, $days), // Utiliser les noms des jours comme clés et valeurs
            'label' => 'Jour de fermeture',
            'required' => false,
            'placeholder' => 'Choisir un jour de fermeture',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StoreHoursType::class,
        ]);
    }
}
