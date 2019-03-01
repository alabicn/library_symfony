<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('src_image')
            ->add('alt_image')
            ->add('title_image')
            ->add('details')
            ->add('publication_date')
            ->add('publisher')
            ->add('original_title')
            ->add('edition_language')
            ->add('pages')
            ->add('first_published')
            ->add('price')
            ->add('libraries')
            ->add('author')
            ->add('editions')
            ->add('genres')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
