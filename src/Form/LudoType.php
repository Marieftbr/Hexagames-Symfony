<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LudoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('types', ChoiceType::class, [
                'choices' => [
                    'jeux de plateaux',
                    'jeux de rôle',
                    'jeux de carte'
                ]
            ])
            ->add('editor', ChoiceType::class, [
                'choices' => [
                    'River Horse',
                    'Iello',
                    'SpaceCowboys'

                ]
            ])
            ->add('playerNumber', ChoiceType::class, [
                'choices' => [
                    '2/3',
                    '3/4',
                    '4/5',
                    '5/6',
                    '6/7',
                    '7/8'
                ]
            ])
            ->add('age', ChoiceType::class, [
                'choices' => [
                    'Enfant',
                    'Adolescent',
                    'Adulte'
                ]
            ])
            ->add('duration', ChoiceType::class, [
                'choices' => [
                    '30min',
                    '1h',
                    '1h30',
                    '2h',
                    '3h',
                    '4h',
                    '5h',
                    '6h',
                    '7h'
                ]
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Enquêtes',
                    'Stratégies',
                    'DeckBuilding',
                    'Historique',
                    'Fantastique'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
