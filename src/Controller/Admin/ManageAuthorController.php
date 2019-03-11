<?php

namespace App\Controller\Admin;

use App\Entity\Quote;
use App\Entity\Author;
use App\Entity\Upload;
use App\Form\QuoteType;
use App\Form\AuthorType;
use App\Form\UploadType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/** @Route("/admin") */
class ManageAuthorController extends AbstractController
{
    /**
     * @Route("/manage/author/addAuthor", name="add_author")
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
            return $this->redirectToRoute('home_admin');
        }
        return $this->render('admin/manage_author/insertAuthor.html.twig', [
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/manage/author/{surname}", name="edit_author")
     */
    public function editAuthorDetails(Author $author, Request $request, ObjectManager $manager)
    {
        $author = $this->getDoctrine()->getRepository(Author::class)->find($author->getId());

        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($author);
            $manager->flush();
            $this->addFlash(
                'success',
                "You have modified " . $author->getName() . " " . $author->getSurname() . "'s details"
            );
            return $this->redirectToRoute('edit_author', ['surname' => $author->getSurname()]);
        }
        return $this->render('admin/manage_author/editAuthor.html.twig', [
            'author' => $author,
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/manage/author/Image/{surname}", name="edit_author_image")
     */
    public function editAuthorImage(Author $author, Request $request, ObjectManager $manager)
    {
        $author = $this->getDoctrine()->getRepository(Author::class)->find($author->getId());

        $upload = new Upload();

        $form = $this->createForm(UploadType::class, $upload);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $upload->getName();
            $fileName = $upload->stripAccents($author->getName()) . " " . $upload->stripAccents($author->getSurname()) . "." . $file->guessExtension();
            $file->move($this->getParameter('upload_directory_author'), $fileName);

            $author->setSrcImage('img_author/' . $fileName);
            $author->setAltImage($fileName);
            $author->setTitleImage($author->getName() . " " . $author->getSurname());

            $manager->persist($author);
            $manager->flush();

            $this->addFlash(
                'success',
                "You have changed " . $author->getName() . " " . $author->getSurname() . "'s photo"
            );

            return $this->redirectToRoute('edit_author', ['surname' => $author->getSurname()]);
        }

        return $this->render('admin/manage_author/editAuthorImage.html.twig', [
            'author' => $author,
            'mainNavMember' => true,
            'title' => 'Member',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addQuote", name="add_quote" )
     */
    public function addQuote(Request $request, ObjectManager $manager)
    {
        $quote = new Quote();

        $form = $this->createForm(QuoteType::class, $quote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($quote);
            $manager->flush();
            $this->addFlash(
                'success',
                "You have added a new quote"
            );

            return $this->redirectToRoute('home_admin');
        }

        return $this->render('admin/manage_author/insertQuote.html.twig', [
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/editQuote/{id}", name="edit_quote")
     */
    public function editQuote(Quote $quote, Request $request, ObjectManager $manager)
    {
        $quote = $this->getDoctrine()->getRepository(Quote::class)->find($quote->getId());

        $form = $this->createForm(QuoteType::class, $quote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($quote);
            $manager->flush();
            $this->addFlash(
                'success',
                "You have modified " . $quote->getAuthor()->getName() . ' ' . $quote->getAuthor()->getSurname() . "'s quote"
            );
            return $this->redirectToRoute('edit_quote', ['id' => $quote->getId()]);
        }
        return $this->render('admin/manage_author/editQuote.html.twig', [
            'quote' => $quote,
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/removeQuote/{id}", name="remove_quote")
     */
    public function removeQuote(Quote $quote, ObjectManager $manager)
    {
        $quote = $this->getDoctrine()->getRepository(Quote::class)->find($quote->getId());

        $manager->remove($quote);
        $manager->flush();
        $this->addFlash(
            'warning',
            "You have deleted " . $quote->getAuthor()->getName() . ' ' . $quote->getAuthor()->getSurname() . "'s quote"
        );

        return $this->redirectToRoute('homepage');
    }
}
