<?php

namespace App\Controller\Admin;

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

        return $this->render('admin/homepage/index.html.twig', [
            'author' => $author,
            'mainNavAdmin' => true, 'title' => 'Espace Admin'
        ]);
    }
}
