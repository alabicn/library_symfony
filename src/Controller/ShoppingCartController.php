<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\ShoppingCart;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;

class ShoppingCartController extends AbstractController
{
    /**
     * @Route("/shopping/cart/{id}", name="shopping_cart")
     */
    public function addToShoppingCart(Book $book, ShoppingCart $shoppingCart, ObjectManager $manager)
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($book->getId());
        $shoppingCart = new ShoppingCart();

        $shoppingCart->setCreationDate(new \DateTime());
        $shoppingCart->addBook($book);

        $manager->persist($shoppingCart);
        $manager->flush();

        return $this->redirectToRoute('shopping_cart', ['id' => $shoppingCart->getId()]);



        return $this->render('shopping_cart/index.html.twig', [
            'shoppingCart' => $shoppingCart,
            'controller_name' => 'ShoppingCartController',
        ]);
    }
}
