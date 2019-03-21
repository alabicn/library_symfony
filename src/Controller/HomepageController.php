<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Genre;
use App\Entity\Quote;

class HomepageController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAllOrderedByName();
        $quotes = $this->getDoctrine()->getRepository(Quote::class)->findAllOrderedByName();


        return $this->render('homepage/index.html.twig', [
            'title' => 'Homepage',

            'genres' => $genres,
            'quotes' => $quotes
        ]);
    }
}
