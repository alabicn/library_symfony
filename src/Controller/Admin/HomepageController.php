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
        $quotes = $this->getDoctrine()->getRepository(Quote::class)->findAllOrderedByName();

        return $this->render('admin/homepage/index.html.twig', [
            'quotes' => $quotes,
            'mainNavAdmin' => true, 
            'title' => 'Admin\'s page' 
        ]);
    }

    /**
     * @Route("/allAuthors", name="all_authors")
     */
    public function listeAuthors()
    {
        $authors = $this->getDoctrine()->getRepository(Author::class)->findAllOrderedByName();

        return $this->render('admin/homepage/listeAuthors.html.twig', [
            'authors' => $authors,
            'title' => 'Authors\' list'
        ]);
    }

    /**
     * @Route("/allBooks", name="all_books")
     */
    public function listeBooks()
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->findAllOrderedByAuthorSurname();

        return $this->render('admin/homepage/listeBooks.html.twig', [
            'books' => $books,
            'title' => 'Books\' list'
        ]);
    }

    /**
     * @Route("/allGenres", name="all_genres")
     */
    public function listeGenres()
    {
        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAllOrderedByName();

        return $this->render('admin/homepage/listeGenres.html.twig', [
            'genres' => $genres,
            'title' => 'Genres\' list'
        ]);
    }

    /**
     * @Route("/allEditions", name="all_editions")
     */
    public function listeEditions()
    {
        $editions = $this->getDoctrine()->getRepository(Edition::class)->findAllOrderedByName();

        return $this->render('admin/homepage/listeEditions.html.twig', [
            'editions' => $editions,
            'title' => 'Editions\' list'
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
