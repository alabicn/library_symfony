<?php

namespace App\Form;

use App\Entity\Quote;
use App\Entity\Author;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class QuoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => function ($author) {
                    return $author->getName() . " " . strtoupper($author->getSurName());
                },
                'query_builder' => function (EntityRepository $author) {
                    return $author->createQueryBuilder('author')
                        ->orderBy('author.surname', 'ASC');
                },

            ])
            ->add('text', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'POST'));;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Quote::class,
        ]);
    }
}
