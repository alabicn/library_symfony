<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Quote;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Library;

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
            'libraries' => $this->library(),
            'quote' => $this->randomQuote()
        ]);
    }

    private function library()
    {
        $all_libraries = $this->getDoctrine()->getRepository(Library::class)->findAll();

        $libraries = array();

        foreach ($all_libraries as $library) {

            $library = [
                "name" => $library->getName(),
                "adresse" => $library->getAdresse(),
                "latitude" => $library->getLatitude(),
                "longitude" => $library->getLongitude()
            ];

            array_push($libraries, $library);

        }

        return $libraries;
    }

    /**
     * @Route("/libraries", name="libraries")
     */
    public function ajaxGetLibraries()
    {
        return new JsonResponse($this->library());
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
