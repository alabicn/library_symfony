<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Genre;
use App\Entity\Author;
use App\Entity\Edition;
use Doctrine\ORM\EntityRepository;
use App\Repository\AuthorRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class BookType extends AbstractType
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
            ->add('title', TextType::class)
            ->add('genres', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => 'name',

                'query_builder' => function (EntityRepository $genre) {
                    return $genre->createQueryBuilder('genre')
                        ->orderBy('genre.name', 'ASC');
                },
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('details', TextareaType::class)
            ->add('publication_date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('publisher', TextType::class)
            ->add('original_title', TextType::class)
            ->add('edition_language', TextType::class)
            ->add('pages', IntegerType::class)
            ->add('first_published', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('editions', EntityType::class, [
                'class' => Edition::class,
                'choice_label' => function ($edition) {
                    return $edition->getName();
                },
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('price', MoneyType::class)
            ->add('save', SubmitType::class, array('label' => 'POST'));;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
