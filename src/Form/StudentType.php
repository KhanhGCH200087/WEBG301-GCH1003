<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,
            [
                'label' => 'Student name',
                'attr' => [
                    'minlength' => 3,
                    'maxlength' => 30
                ]
            ])
            ->add('age', IntegerType::class,
            [
                'label' => 'Student age',
                'attr' => [
                    'min' => 15,
                    'max' => 80
                ]
            ])
            ->add('address',TextType::class,
            [
                'label' => 'Student address',
                'attr' => [
                    'minlength' => 3,
                    'maxlength' => 50
                ]
            ])
            ->add('image' ,TextType::class,
            [
                'label' => 'Student image',
                'attr' => [
                    'maxlength' => 255
                ]
            ])
            ->add('email' ,TextType::class,
            [
                'label' => 'Student emails',
                'attr' => [
                    'minlength' => 10,
                    'maxlength' => 255
                ]
            ])
            ->add('pass' ,TextType::class,
            [
                'label' => 'Student Password',
                'attr' => [
                    'minlength' => 5,
                    'maxlength' => 255
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
            // Configure your form options here
        ]);
    }
}
