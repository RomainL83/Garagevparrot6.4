<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Company;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName')
            ->add('email')
            ->add('password', PasswordType::class, [
                'required' => true, // Rend le champ obligatoire
                'mapped' => false, // Ne mappe pas directement à l'entité (à gérer dans le contrôleur)
            ])
            ->add('roles', CollectionType::class, [
                'entry_type' => TextType::class,
                'required' => false, // Rend le champ non obligatoire
                'entry_options' => ['label' => false],
                'allow_add' => true, // Permet l'ajout de nouveaux rôles
                'allow_delete' => true, // Permet la suppression de rôles
            ])
            ->add('companyFunction', TextType::class, [
                'required' => true, // Rend le champ obligatoire
            ])
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'choice_label' => 'name', // Utilisez la propriété qui devrait être affichée dans les options
                'required' => true, // Rend le champ obligatoire
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
