<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;

class CartController extends AbstractController
{
    /**
     * @Route("/shopping/cart/{id}", name="shopping_cart")
     */
    public function addToCart(Book $book)
    {
        $cart = $this->get("session")->get("cart");
        
        if(empty($cart))
        {
            $cart = array();
        }
        
        if(!in_array($book->getId(), $cart))
        {
            $cart[] = $book->getId();
        }
        
        $this->get("session")->set("cart", $cart);
        $this->addFlash(
            'success',
            "You've added this book to the cart"
        );

        return $this->redirectToRoute('show_book', ['id' => $book->getId()]);
    }

    /**
     * @Route("/cart/show", name="show_cart")
     */
    public function showCart(ObjectManager $em) 
    {
        $cart = $this->get("session")->get("cart");
   
        $lines = array();
        
        if(!empty($cart))
        {
            foreach($cart as $id)
            {
                $book = $em->getRepository(Book::class)->find($id);
                $lines[] = $book;
            }
        }
       
        return $this->render('shopping_cart/index.html.twig', [
            "cartlines" => $lines
        ]);
    }

    /**
     * @Route("/cart/book/{id}", name="remove_from_cart")
     */
    public function removeFromCart(ObjectManager $em)
    {
        $cart = $this->get("session")->get("cart");
        
        

        foreach($cart as $id)
            {
                $book = $em->getRepository(Book::class)->find($id);
                $this->get("session")->remove("book", $book);
            }

        $this->addFlash(
            'danger',
            "You've removed this book from the cart"
        );
        
        return $this->redirectToRoute('show_cart');
    }
}
