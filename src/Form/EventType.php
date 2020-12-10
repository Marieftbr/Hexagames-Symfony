<?php

namespace App\Form;

use App\Entity\Game;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('date', DateType::class)
            ->add('game', EntityType::class, [
                'class' => Game::class,
                'choice_label' => 'name',
                'placeholder' => 'Sélectionnez un jeu'
            ])
            ->add('number_player', NumberType::class)
            ->add('location', ChoiceType::class, [
                'choices' => [
                    'Bourg-en-Bresse (01)' => 'Bourg-en-Bresse (01)',
                    'Laon (02)' => 'Laon (02)',
                    'Moulins (03)' => 'Moulins (03)',
                    'Digne (04)' => 'Digne (04)',
                    'Gap (05)' => 'Gap (05)',
                    'Nice (06)' => 'Nice (06)',
                    'Privas (07)' => 'Privas (07)',
                    'Charleville-Mézières (08)' => 'Charleville-Mézières (08)',
                    'Foix (09)' => 'Foix (09)',
                    'Troyes (10)' => 'Troyes (10)',
                    'Carcassonne (11)' => 'Carcassonne (11)',
                    'Rodez (12)' => 'Rodez (12)',
                    'Marseille (13)' => 'Marseille (13)',
                    'Caen (14)' => 'Caen (14)',
                    'Aurilac (15)' => 'Aurilac (15)',
                    'Angoulême (16)' => 'Angoulême (16)',
                    'La Rochelle (1' => 'La Rochelle (17)',
                    'Bourges (18)' => 'Bourges (18)',
                    'Tulle (19)' => 'Tulle (19)',
                    'Ajaccio (2A)' => 'Ajaccio (2A)',
                    'Bastia (2B)' => 'Bastia (2B)',
                    'Dijon (21)' => 'Dijon (21)',
                    'Saint-Brieuc (22)' => 'Saint-Brieuc (22)',
                    'Guéret (23)' => 'Guéret (23)',
                    'Périgueux (24)' => 'Périgueux (24)',
                    'Besançon (25)' => 'Besançon (25)',
                    'Valence (26)' => 'Valence (26)',
                    'Evreux (27)' => 'Evreux (27)',
                    'Chartres (28)' => 'Chartres (28)',
                    'Quimper (29)' => 'Quimper (29)',
                    'Nîmes (30)' => 'Nîmes (30)',
                    'Toulouse (31)' => 'Toulouse (31)',
                    'Auch (32)' => 'Auch (32)',
                    'Bordeaux (33)' => 'Bordeaux (33)',
                    'Montpellier (34)' => 'Montpellier (34)',
                    'Rennes (35)' => 'Rennes (35)',
                    'chateauroux (36)' => 'chateauroux (36)',
                    'Tours (37)' => 'Tours (37)',
                    'Grenoble (38)' => 'Grenoble (38)',
                    'Lons-le-Saunier (39)' => 'Lons-le-Saunier (39)',
                    'Mont-de-Marsan (40)' => 'Mont-de-Marsan (40)',
                    'Blois (41)' => 'Blois (41)',
                    'Saint-Etienne (42)' => 'Saint-Etienne (42)',
                    'Le Puy-en-Velay (43)' => 'Le Puy-en-Velay (43)',
                    'Nantes (44)' => 'Nantes (44)',
                    'Orléans (45)' => 'Orléans (45)',
                    'Cahors (46)' => 'Cahors (46)',
                    'Agen (47)' => 'Agen (47)',
                    'Mende (48)' => 'Mende (48)',
                    'Angers (49)' => 'Angers (49)',
                    'Saint-Lô (50)' => 'Saint-Lô (50)',
                    'Châlons-en-Champagne (51)' => 'Châlons-en-Champagne (51)',
                    'Chaumont (52)' => 'Chaumont (52)',
                    'Laval (53)' => 'Laval (53)',
                    'Nancy (54)' => 'Nancy (54)',
                    'Bar-le-Duc (55)' => 'Bar-le-Duc (55)',
                    'Vannes (56)' => 'Vannes (56)',
                    'Metz (57)' => 'Metz (57)',
                    'Nevers (58)' => 'Nevers (58)',
                    'Lille (59)' => 'Lille (59)',
                    'Beauvais (60)' => 'Beauvais (60)',
                    'Alençon (61)' => 'Alençon (61)',
                    'Arras (62)' => 'Arras (62)',
                    'Clermont-Ferrand (63)' => 'Clermont-Ferrand (63)',
                    'Pau (64)' => 'Pau (64)',
                    'Tarbes (65)' => 'Tarbes (65)',
                    'Perpignan (66)' => 'Perpignan (66)',
                    'Strasbourg (67)' => 'Strasbourg (67)',
                    'Colmar (68)' => 'Colmar (68)',
                    'Lyon (69)' => 'Lyon (69)',
                    'Vesoul (70)' => 'Vesoul (70)',
                    'Mâcon (71)' => 'Mâcon (71)',
                    'Le Mans (72)' => 'Le Mans (72)',
                    'Chambéry (73)' => 'Chambéry (73)',
                    'Annecy (74)' => 'Annecy (74)',
                    'Paris (75)' => 'Paris (75)',
                    'Rouen (76)' => 'Rouen (76)',
                    'Melun (77)' => 'Melun (77)',
                    'Versailles (78)' => 'Versailles (78)',
                    'Niort (79)' => 'Niort (79)',
                    'Amiens (80)' => 'Amiens (80)',
                    'Albi (81)' => 'Albi (81)',
                    'Montauban (82)' => 'Montauban (82)',
                    'Toulon (83)' => 'Toulon (83)',
                    'Avignon (84)' => 'Avignon (84)',
                    'La-Roche-sur-Yon (85)' => 'La-Roche-sur-Yon (85)',
                    'Poitiers (86)' => 'Poitiers (86)',
                    'Limoges (87)' => 'Limoges (87)',
                    'Epinal (88)' => 'Epinal (88)',
                    'Auxerre (89)' => 'Auxerre (89)',
                    'Belfort (90)' => 'Belfort (90)',
                    'Evry (91)' => 'Evry (91)',
                    'Nanterre (92)' => 'Nanterre (92)',
                    'Bobigny (93)' => 'Bobigny (93)',
                    'Créteil (94)' => 'Créteil (94)',
                    'Pontoise (95)' => 'Pontoise (95)'

                ]
            ])
            ->add('description', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
