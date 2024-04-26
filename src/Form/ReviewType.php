<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('rating',ChoiceType::class, [
                'choices'  => [
                    '⭐⭐⭐⭐⭐' => 5,
                    '⭐⭐⭐⭐' => 4,
                    '⭐⭐⭐' => 3,
                    '⭐⭐' => 2,
                    '⭐' => 1,
                ],
            ])
            ->add('message')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
