<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Genre;

class GenreController extends AbstractController
{
    /**
     * @Route("/genre/{name}", name="show_genre")
     */
    public function show($name){

        $genre = $this->getDoctrine()->getRepository(Genre::class)->findOneByName($name);

        return $this->render('genre/index.html.twig', [
            'genre' => $genre,
        ]);
    }
}
