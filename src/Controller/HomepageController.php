<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Quote;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAllOrderedByName();

        return $this->render('homepage/index.html.twig', [
            'title' => 'Homepage',

            'genres' => $genres,
            'quote' => $this->randomQuote()
        ]);
    }

    private function randomQuote()
    {
        // get all tasks
        $quotes = $this->getDoctrine()->getRepository(Quote::class)->findAll();
        // shuffle records
        shuffle($quotes);

        $quote = $quotes[0];

        $randomQuote = [
            "img" => array("src" => $quote->getAuthor()->getSrcImage(), "alt" => $quote->getAuthor()->getAltImage(), "title" => $quote->getAuthor()->getTitleImage()),
            "text" => $quote->getText(),
            "author" => $quote->getAuthor()->getName()." ".$quote->getAuthor()->getSurname()
        ];

        return $randomQuote;
    }

    /**
     * @Route("/random", name="randquote")
     */

    public function ajaxRandomQuote(){
        return new JsonResponse($this->randomQuote());
    }
}
