<?php

namespace App\Form;

use App\Entity\VideoGame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class VideoGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('developer', TextType::class, [
                'label' => 'Développeur',
                'required' => false,
            ])
            ->add('publisher', TextType::class, [
                'label' => 'Editeur',
                'required' => false,
            ])
            ->add('releaseDate', DateType::class, [
                'input'  => 'datetime_immutable',
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'label' => 'Date de sortie'
            ])
            ->add('console', TextType::class, [
                'label' => 'Console / Support'
            ])

            ->add('country', TextType::class, [
                'label' => 'Pays'
            ])

            ->add('imageFile', VichImageType::class, [
                'label' => 'Image',
                'required' => false,
                'delete_label' => "Supprimer l'image",
            ])

            ->add('acquisitionDate', DateType::class, [
                'input'  => 'datetime_immutable',
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'label' => "Date d'acquisition",
                'required' => false,
            ])

            ->add('acquisitionPrice', TextType::class, [
                'label' => "Prix d'acquisition",
                'required' => false,
            ])

            ->add('conservation', TextareaType::class, [
                'label' => 'Etat',
                'required' => false,
            ])
            ->add('commentary', TextareaType::class, [
                'label' => 'Commentaire',
                'required' => false,
            ])
            ->add('rating', ChoiceType::class, [
                'label' => 'Note',
                'choices' => [
                    'Aucune' => null,
                    'Très mauvais' => 1,
                    'Mauvais' => 2,
                    'Moyen' => 3,
                    'Bon' => 4,
                    'Excellent' => 5
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter',
                "attr" => ["class" => "btn-blue"]

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => VideoGame::class,
        ]);
    }
}
