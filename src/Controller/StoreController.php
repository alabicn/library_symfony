<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use App\Entity\Book;
use App\Entity\Genre;
use App\Entity\Edition;
use App\Entity\Evaluation;

use App\Form\EvaluationType;

class StoreController extends AbstractController
{
    /**
     * @Route("/book/show/{id}", name="show_book")
     */
    public function showBook($id) {
       
        $book = $this->getDoctrine()->getRepository(Book::class)->find($id);


        


        /*$evaluation = new Evaluation();
        $evaluation->setDateEvaluation(new \DateTime());
        
        $form = $this->createForm(EvaluationType::class);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evaluation);
            $entityManager->flush();

            $this->addFlash('success', 'Your account has been saved.');
                
            
*/
        return $this->render('store/book.html.twig', [
            'book' => $book,
            'evaluations' => $book->getEvaluations(),
            //'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/book/show/{id}", name="form_book")
     */
    /*public function registerEvaluation(Request $request){
        
        $evaluation = new Evaluation();
        $form = $this->createForm(EvaluationType::class, $evaluation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $evaluation->setRating($rating);
            $evaluation->setComment($comment);
            $evaluation->setFavorite($favorite);
            $evaluation->setDateEvaluation(new \DateTime());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evaluation);
            $entityManager->flush();

            $this->addFlash('success', 'Your account has been saved.');
             
            }
                return $this->render('book/show/index.html.twig', [
                    'form' => $form->createView()
                ]);
    }*/

    /**
     * @Route("/genre/{name}", name="show_genre")
     */
    public function listeGenre($name){

        $genre = $this->getDoctrine()->getRepository(Genre::class)->findOneByName($name);

        return $this->render('store/genre.html.twig', [
            'genre' => $genre,
        ]);
    }
}
