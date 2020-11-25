<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Editor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LudoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
            ->add('types', ChoiceType::class, [
                'choices' => [
                    'Type de jeux' => null,
                    'jeux de plateaux' => 1,
                    'jeux de rôle' => 2,
                    'jeux de carte' => 3
                ]
            ])
            ->add('editor', EntityType::class, [
                'placeholder' => 'Editeur',
                'class' => Editor::class,
                'choice_label' => 'name',
            ])
            ->add('playerNumberMin', IntegerType::class, [
                // 'placeholder' => 'Nombre de joueurs',
            ])
            ->add('playerNumberMax', IntegerType::class, [
                //'placeholder' => 'Nombre de joueurs',
            ])
            ->add('ageMin', IntegerType::class)
            ->add('duration', ChoiceType::class, [
                'choices' => [
                    'Durée' => null,
                    '30min' => 30,
                    '1h' => 60,
                    '1h30' => 60 + 30,
                    '2h' => 2 * 60,
                    '3h' => 3 * 60,
                    '4h' => 4 * 60,
                    '5h' => 5 * 60,
                    '6h' => 6 * 60,
                    '7h' => 7 * 60
                ]
            ])
            ->add('category', EntityType::class, [
                'placeholder' => 'Catégories',
                'class' => Category::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'label_format' => 'ludo.%name%.label',
        ]);
    }
}
