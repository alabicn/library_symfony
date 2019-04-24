<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use App\Entity\Genre;
use App\Entity\Quote;
use App\Entity\Author;
use App\Entity\Edition;
use App\Entity\Evaluation;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/** @Route("/admin") */
class HomepageController extends Controller
{

    /**
     * @Route("/", name="home_admin")
     */
    public function index()
    {

        $authors = $this->getDoctrine()->getRepository(Author::class)->findAllOrderedByName();
        $books = $this->getDoctrine()->getRepository(Book::class)->findAllOrderedByAuthorSurname();
        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAllOrderedByName();
        $editions = $this->getDoctrine()->getRepository(Edition::class)->findAllOrderedByName();
        $quotes = $this->getDoctrine()->getRepository(Quote::class)->findAllOrderedByName();

        return $this->render('admin/homepage/index.html.twig', [
            'authors' => $authors,
            'books' => $books,
            'genres' => $genres,
            'editions' => $editions,
            'quotes' => $quotes,
            'mainNavAdmin' => true, 
            'title' => 'Admin\'s page' 
        ]);
    }

    /**
     *@Route("/evaluation/{id}", name="remove_evaluation")
     */
    public function removeEvaluation(Evaluation $evaluation, ObjectManager $manager) 
    {
        $evaluation = $this->getDoctrine()->getRepository(Evaluation::class)->find($evaluation->getId());
   
        $manager->remove($evaluation);
        $manager->flush();
        $this->addFlash(
            'warning',
            "You have deleted " . $evaluation->getUser()->getUname() . "'s evaluation" 
        );
       
        return $this->redirectToRoute('show_book', ['id' => $evaluation->getBook()->getId()]);
    }
}
