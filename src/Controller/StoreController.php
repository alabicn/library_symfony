<?php

namespace App\Controller;

use App\Entity\Book;

use App\Entity\Genre;
use App\Entity\Edition;

use App\Entity\Evaluation;
use App\Form\EvaluationType;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StoreController extends AbstractController
{
    /**
     * @Route("/book/show/{id}", name="show_book")
     */
    public function showBook(Book $book, Request $request, ObjectManager $manager) {
       
        $book = $this->getDoctrine()->getRepository(Book::class)->find($book->getId());
        
        $evaluation = new Evaluation();
        $form = $this->createForm(EvaluationType::class, $evaluation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $evaluation->setDateEvaluation(new \DateTime())
                       ->setBook($book)
                       ->setUser($this->getUser());           

            $manager->persist($evaluation);
            $manager->flush();

            return $this->redirectToRoute('show_book', ['id' => $book->getId()]);
        }
        

        return $this->render('store/book.html.twig', [
            'title' => 'Book n° ' . $book->getId(),
            'book' => $book,
            'evaluations' => $book->getEvaluations(),
            'evaluationForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/genre/{name}", name="show_genre")
     */
    public function listeGenre($name){

        $genre = $this->getDoctrine()->getRepository(Genre::class)->findOneByName($name);

        return $this->render('store/genre.html.twig', [
            'genre' => $genre,
            'title' => $genre->getName()
        ]);
    }
}
