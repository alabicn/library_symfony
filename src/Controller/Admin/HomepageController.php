<?php

namespace App\Controller\Admin;

use App\Entity\Genre;
use App\Entity\Quote;
use App\Entity\Author;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/** @Route("/admin") */
class HomepageController extends Controller
{

    /**
     * @Route("/")
     */
    public function index()
    {

        $author = $this->getDoctrine()->getRepository(Author::class)->findAllOrderedByName();
        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAllOrderedByName();
        $quotes = $this->getDoctrine()->getRepository(Quote::class)->findAllOrderedByName();

        return $this->render('admin/homepage/index.html.twig', [
            'author' => $author,
            'genres' => $genres,
            'quotes' => $quotes,
            'mainNavAdmin' => true, 'title' => 'Espace Admin'
        ]);
    }
}
