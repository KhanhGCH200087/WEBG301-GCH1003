<?php

namespace App\Form;

use Doctrine\DBAL\Types\TextType;
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
                'requiredMessage' => 'Please enter teacher name',
                'label' => 'Teacher name', 
                'attr' => [
                    'minlength' => 2,
                ]
            ])

            ->add('Teacher_age', TextType::class, 
            [
                'required' => true, 
                'requiredMessage' => 'Please enter age',
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
                'requiredMessage' => 'Please enter gender of teacher',
                'label' => 'Teacher gender',
            ]) 

            ->add('Teacher_email', EmailType::class, 
            [
                'required' => true, 
                'requiredMessage' => 'Please enter email',
                'label' => 'Teacher email',
                'email' => true,
            ]) 

            ->add('Teacher_pass', PasswordType::class, 
            [
                'required' => true, 
                'requiredMessage' => 'Please enter password',
                'label' => 'Teacher password',
            ]) 
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
