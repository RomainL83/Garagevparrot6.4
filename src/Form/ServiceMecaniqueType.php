<?php

namespace App\Form;

use App\Entity\ServiceMecanique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceMecaniqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('generalRepairs')
            ->add('brakeMaintenance')
            ->add('beltReplacement')
            ->add('diagnostics')
            ->add('otherServices')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ServiceMecanique::class,
        ]);
    }
}
