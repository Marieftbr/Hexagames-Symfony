<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Editor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('name', TextType::class)
            ->add('synopsis', TextareaType::class)
            ->add('isbn', TextType::class)
            ->add('editor', EntityType::class, [
                'placeholder' => 'Editeurs',
                'class' => Editor::class,
                'choice_label' => 'name'
            ])
            ->add('playerNumberMin', IntegerType::class, [
               // 'placeholder' => 'Nombre de joueurs',
            ])
            ->add('playerNumberMax', IntegerType::class, [
                //'placeholder' => 'Nombre de joueurs',
            ])
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
            ->add('categories', EntityType::class, [
                'placeholder' => 'Catégories',
                'multiple' => true,
                'class' => Category::class,
                'choice_label' => 'name',
            ])
            ->add('types', ChoiceType::class, [
                'choices' => [
                    'Type de jeux' => null,
                    'jeux de plateaux' => 1,
                    'jeux de rôle' => 2,
                    'jeux de carte' => 3
                ]
            ])
            ->add('ageMin', IntegerType::class)
            ->add('photo', FileType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'label_format' => 'game.%name%.label',
        ]);
    }
}
