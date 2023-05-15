<?php

namespace App\Form;

use App\Entity\VideoGame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VideoGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('developer', TextType::class, [
                'label' => 'Développeur'
            ])
            ->add('publisher', TextType::class, [
                'label' => 'Editeur'
            ])
            ->add('release_date', DateType::class, [
                'input'  => 'datetime_immutable',
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
                'label' => 'Date de sortie'
            ])
            ->add('console', TextType::class, [
                'label' => 'Console / Support'
            ])
            ->add('conservation', TextareaType::class, [
                'label' => 'Etat'
            ])
            ->add('commentary', TextareaType::class, [
                'label' => 'Commentaire'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Ajouter'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => VideoGame::class,
        ]);
    }
}
