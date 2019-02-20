<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Entity\Genre;
use App\Entity\Quote;

class HomepageController extends Controller {

    /**
     * @Route("/")
     */
    public function index() {


        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAllOrderedByName();
        $quotes = $this->getDoctrine()->getRepository(Quote::class)->findAllOrderedByName();


        return $this->render('homepage/index.html.twig', [
            'mainNavHome'=>true, 
            'title'=>'Accueil',
     
            'genres' => $genres,
            'quotes' => $quotes
        ]);
    
    
    }

}
