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
                    'Type de jeux' => true,
                    'jeux de plateaux' => true,
                    'jeux de rôle' => true,
                    'jeux de carte' => true
                ]
            ])
            ->add('editor', ChoiceType::class, [
                'choices' => [
                    'Maison d\'édition' => true,
                    'River Horse' => true,
                    'Iello' => true,
                    'SpaceCowboys' => true

                ]
            ])
            ->add('playerNumber', ChoiceType::class, [
                'choices' => [
                    'Nombre de joueur' => true,
                    '2/3' => true,
                    '3/4' => true,
                    '4/5' => true,
                    '5/6' => true,
                    '6/7' => true,
                    '7/8' => true
                ]
            ])
            ->add('age', ChoiceType::class, [
                'choices' => [
                    'Âge' => true,
                    'Enfant' => true,
                    'Adolescent' => true,
                    'Adulte' => true
                ]
            ])
            ->add('duration', ChoiceType::class, [
                'choices' => [
                    'Durée' => true,
                    '30min' => true,
                    '1h' => true,
                    '1h30' => true,
                    '2h' => true,
                    '3h' => true,
                    '4h' => true,
                    '5h' => true,
                    '6h' => true,
                    '7h' => true
                ]
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Catégories' => true,
                    'Enquêtes' => true,
                    'Stratégies' => true,
                    'DeckBuilding' => true,
                    'Historique' => true,
                    'Fantastique' => true
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
