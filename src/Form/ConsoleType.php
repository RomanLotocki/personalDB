<?php

namespace App\Form;

use App\Entity\Console;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ConsoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('manufacturer', TextType::class, [
                'label' => 'Fabricant'
            ])
            ->add('releaseDate', DateType::class, [
                'input'  => 'datetime_immutable',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'label' => 'Date de sortie'
            ])
            ->add('country', TextType::class, [
                'label' => 'Pays'
            ])
            ->add('model', TextType::class, [
                'label' => 'Modèle',
                'required' => false
            ])
            ->add('acquisitionDate', DateType::class, [
                'input'  => 'datetime_immutable',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'label' => "Date d'acquisition",
                'required' => false,
            ])
            ->add('acquisitionPrice', TextType::class, [
                'label' => "Prix d'acquisition",
                'required' => false
            ])
            ->add('accessories', TextareaType::class, [
                'label' => 'Accessoires',
                'required' => false,
            ])
            ->add('conservationAndCommentaries', TextareaType::class, [
                'label' => 'Etat et commentaires',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Console::class,
        ]);
    }
}
