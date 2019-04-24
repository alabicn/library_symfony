<?php

namespace App\Form;


use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class PasswordUpdateType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('oldPassword', PasswordType::class, $this->getConfiguration("Old password", "Type your old password"))
            ->add('newPassword', PasswordType::class, $this->getConfiguration("New password", "Type your new password"))
            ->add('confirmPassword', PasswordType::class, $this->getConfiguration("Confirmation password", "Confirm your new password"))
            ->add('submit', SubmitType::class, ['label' => 'Submit', 'attr' => ['class' => 'btn-primary btn-block']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
