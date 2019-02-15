<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('username', TextType::class)
                ->add('email', EmailType::class)
                ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Retype password'),
                ))
                ->add('birthdate', BirthdayType::class, [
                    'placeholder' => [
                        'year' => 'Year', 
                        'month' => 'Month', 
                        'day' => 'Day',
                    ]
                ])
                ->add('gender', ChoiceType::class, [
                    'choices' => [
                        'Male' => '0',
                        'Female' => '1',
                    ]])
                ->add('submit', SubmitType::class, ['label'=>'Sign Up', 'attr'=>['class'=>'btn-primary btn-block']])
        ;
    }
}