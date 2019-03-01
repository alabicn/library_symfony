<?php

namespace App\Controller\Admin;

use App\Entity\Author;

use App\Entity\Upload;
use App\Entity\Book;
use App\Form\AuthorType;
use App\Form\UploadType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/** @Route("/admin") */
class StoreController extends Controller
{

    /**
     * @Route("/addAuthor", name="add_author")
     */
    public function insertAuthor(Request $request, ObjectManager $manager)
    {
        $author = new Author();

        $form = $this->createForm(AuthorType::class, $author);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $author->setSrcImage('img_author/default.png');
            $author->setAltImage('default.png');
            $author->setTitleImage('Default photo');

            $manager->persist($author);
            $manager->flush();

            $this->addFlash(
                'success',
                "You have added new Author"
            );

            return $this->redirectToRoute('add_author');
        }
        return $this->render('admin/store/insertAuthor.html.twig', [
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/author/show/{id}", name="show_author")
     */
    public function showAuthor(Author $author, Request $request, ObjectManager $manager)
    {

        $author = $this->getDoctrine()->getRepository(Author::class)->find($author->getId());
        $upload = new Upload();

        $form = $this->createForm(UploadType::class, $upload);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $upload->getName();
            $fileName = $author->getName() . " " . $author->getSurname() . "." . $file->guessExtension();
            $file->move($this->getParameter('upload_directory_author'), $fileName);

            $author->setSrcImage('img_author/' . $fileName);
            $author->setAltImage($fileName);
            $author->setTitleImage($author->getName() . " " . $author->getSurname());

            $manager->persist($author);
            $manager->flush();

            $this->addFlash(
                'success',
                "You have changed " . $author->getName() . " " . $author->getSurname() . "'s photo "
            );

            return $this->redirectToRoute('show_author', ['id' => $author->getId()]);
        }
        return $this->render('admin/store/author.html.twig', [
            'author' => $author,
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }


    /**
     * @Route("/")
     */
    /*public function insertBook(Book $book, Request $request, ObjectManager $manager)
    {

        $book = new Book();

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $book->$manager->persist($book);
            $manager->flush();

            //return $this->redirectToRoute('show_book', ['id' => $book->getId()]);
            return $this->render('admin/store/insertBook.html.twig', ['mainNavAdmin' => true, 'title' => 'Espace Admin']);
        }
    }*/
}
