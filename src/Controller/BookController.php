<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Entity\Edition;

class BookController extends AbstractController
{
    /**
     * @Route("/book/show/{id}", name="show_book")
     */
    public function show($id) {
        $book = $this->getDoctrine()
                ->getRepository(Book::class)
                ->find($id);

        return $this->render('book/show/index.html.twig', [
            'book' => $book,
        ]);
    }
}
