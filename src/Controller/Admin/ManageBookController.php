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
class ManageBookController extends Controller
{

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
            return $this->redirectToRoute('home_admin');
        }
        return $this->render('admin/manage_book/insertBook.html.twig', [
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }
    /**
     * @Route("/book/{id}", name="edit_book")
     */
    public function editBookDetails(Book $book, Request $request, ObjectManager $manager)
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($book->getId());

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($book);
            $manager->flush();
            $this->addFlash(
                'success',
                "You have modified " . $book->getAuthor()->getName() . " " . strtoupper($book->getAuthor()->getSurname()) . " - " . $book->getTitle() . "'s details"
            );
            return $this->redirectToRoute('edit_book', ['id' => $book->getId()]);
        }
        return $this->render('admin/manage_book/editBook.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/manage/book/Image/{id}", name="edit_book_image")
     */
    public function editBookImage(Book $book, Request $request, ObjectManager $manager)
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($book->getId());

        $upload = new Upload();

        $form = $this->createForm(UploadType::class, $upload);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $upload->getName();
            $fileName = $upload->stripAccents($book->getAuthor()->getName()) . " " . $upload->stripAccents(strtoupper($book->getAuthor()->getSurname())) . " - " . $upload->stripAccents($book->getTitle()) . "." . $file->guessExtension();
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

            return $this->redirectToRoute('edit_book', ['id' => $book->getId()]);
        }

        return $this->render('admin/manage_book/editBookImage.html.twig', [
            'book' => $book,
            'mainNavMember' => true,
            'title' => 'Member',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addGenre", name="add_genre" )
     */
    public function insertGenre(Request $request, ObjectManager $manager)
    {
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
        return $this->render('admin/manage_book/insertGenre.html.twig', [
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/editGenre/{name}", name="edit_genre")
     */
    public function editGenre(Genre $genre, Request $request, ObjectManager $manager)
    {
        $genre = $this->getDoctrine()->getRepository(Genre::class)->find($genre->getId());

        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($genre);
            $manager->flush();
            $this->addFlash(
                'success',
                "You have modified " . $genre->getName() . "'s details"
            );
            return $this->redirectToRoute('edit_genre', ['name' => $genre->getName()]);
        }
        return $this->render('admin/manage_book/editGenre.html.twig', [
            'genre' => $genre,
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);

    }


    /**
     * @Route("/addEdition", name="add_edition" )
     */
    public function insertEdition(Request $request, ObjectManager $manager)
    {
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
        return $this->render('admin/manage_book/insertEdition.html.twig', [
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/editEdition/{name}", name="edit_edition")
     */
    public function editEdition(Edition $edition, Request $request, ObjectManager $manager)
    {
        $edition = $this->getDoctrine()->getRepository(Edition::class)->find($edition->getId());

        $form = $this->createForm(EditionType::class, $edition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($edition);
            $manager->flush();
            $this->addFlash(
                'success',
                "You have modified " . $edition->getName() . "'s details"
            );
            return $this->redirectToRoute('edit_edition', ['name' => $edition->getName()]);
        }
        return $this->render('admin/manage_book/editEdition.html.twig', [
            'edition' => $edition,
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);

    }
}
