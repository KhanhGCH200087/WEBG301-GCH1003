<?php

namespace App\Form;

use App\Entity\Teacher;
//use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Teacher_name', TextType::class, 
            [
                'required' => true,
                'mapped' => false, 
                'label' => 'Teacher name', 
                'attr' => [
                    'minlength' => 2,
                ]
            ])

            ->add('Teacher_age', TextType::class, 
            [
                'required' => true, 
                'mapped' => false, 
                'label' => 'Teacher age',
                'attr' => [
                    'min' => 20,
                    'minMessage' => 'Age must at least 20',
                    'max' => 80,
                    'maxMessage' => 'Age must less than 81',
                ]
            ]) 

            ->add('Teacher_gender', TextType::class, 
            [
                'required' => true, 
                'mapped' => false, 
                'label' => 'Teacher gender',
            ]) 

            ->add('Teacher_email', TextType::class, 
            [
                'mapped' => false, 
                'required' => true, 
                'label' => 'Teacher email',
            ]) 

            ->add('Teacher_pass', TextType::class, 
            [
                'mapped' => false, 
                'required' => true, 
                'label' => 'Teacher password',
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}
