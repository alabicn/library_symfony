<?php

namespace App\Controller\Admin;

use App\Entity\Book;

use App\Entity\Genre;
use App\Entity\Author;
use App\Entity\Upload;
use App\Form\BookType;
use App\Entity\Edition;
use App\Form\GenreType;
use App\Form\AuthorType;
use App\Form\UploadType;
use App\Form\EditionType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/** @Route("/admin") */
class StoreController extends Controller
{

    public function stripAccents($str) {
        return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }

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
     * @Route("/author/{surname}", name="edit_image_author")
     */
    public function editAuthor(Author $author, Request $request, ObjectManager $manager)
    {
        $author = $this->getDoctrine()->getRepository(Author::class)->find($author->getId());
        $upload = new Upload();
        $form = $this->createForm(UploadType::class, $upload);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $upload->getName();
            $fileName = self::stripAccents($author->getName()) . " " . self::stripAccents($author->getSurname()) . "." . $file->guessExtension();
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
            return $this->redirectToRoute('edit_image_author', ['surname' => $author->getSurname()]);
        }
        return $this->render('admin/store/editImageAuthor.html.twig', [
            'author' => $author,
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/addBook", name="add_book")
     */
    public function insertBook(Request $request, ObjectManager $manager)
    {
        $book = new Book();

        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $book->setSrcImage('img_book/default.jpg');
            $book->setAltImage('default.jpg');
            $book->setTitleImage('Default photo');

            $manager->persist($book);
            $manager->flush();

            $this->addFlash(
                'success',
                "You have added new Book"
            );

            return $this->redirectToRoute('add_book');
        }
        return $this->render('admin/store/insertBook.html.twig', [
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/book/{id}", name="edit_cover_book")
     */
    public function editBook(Book $book, Request $request, ObjectManager $manager)
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($book->getId());
        $upload = new Upload();
        $form = $this->createForm(UploadType::class, $upload);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $upload->getName();
            $fileName = self::stripAccents($book->getAuthor()->getName()) . " " . self::stripAccents(strtoupper($book->getAuthor()->getSurname())) . " - " . self::stripAccents($book->getTitle()) . "." . $file->guessExtension();
            $file->move($this->getParameter('upload_directory_book'), $fileName);
            $book->setSrcImage('img_book/' . $fileName);
            $book->setAltImage($fileName);
            $book->setTitleImage($book->getTitle() . " by " . $book->getAuthor()->getName() . " " . strtoupper($book->getAuthor()->getSurname()) . " (cover photo)");
            $manager->persist($book);
            $manager->flush();
            $this->addFlash(
                'success',
                "You have modified cover photo of " . $book->getAuthor()->getName() . " " . strtoupper($book->getAuthor()->getSurname()) . " - " . $book->getTitle()
            );
            return $this->redirectToRoute('edit_cover_book', ['id' => $book->getId()]);
        }
        return $this->render('admin/store/editCoverBook.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/addGenre", name="add_genre" )
     */

     public function insertGenre(Request $request, ObjectManager $manager) {

        $genre = new Genre();

        $form = $this->createForm(GenreType::class, $genre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($genre);
            $manager->flush();

            $this->addFlash(
                'success',
                "You have added new Genre"
            );

            return $this->redirectToRoute('add_genre');
        }
        return $this->render('admin/store/insertGenre.html.twig', [
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
     }

     /**
     * @Route("/addEdition", name="add_edition" )
     */

    public function insertEdition(Request $request, ObjectManager $manager) {

        $edition = new Edition();

        $form = $this->createForm(EditionType::class, $edition);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($edition);
            $manager->flush();

            $this->addFlash(
                'success',
                "You have added new Edition"
            );

            return $this->redirectToRoute('add_edition');
        }
        return $this->render('admin/store/insertEdition.html.twig', [
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
     }
}
