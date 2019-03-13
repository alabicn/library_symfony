<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\ShoppingCart;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;

class ShoppingCartController extends AbstractController
{
    
    /*public function addToShoppingCart(Book $book, ShoppingCart $shoppingCart, OnlineShoppingCart $onlineShoppingCart, ObjectManager $manager)
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($book->getId());
        $shoppingCart = new ShoppingCart();
        $onlineShoppingCart = new OnlineShoppingCart();

        $shoppingCart->setCreationDate(new \DateTime());
        $onlineShoppingCart->setBooks($book);
        $onlineShoppingCart->setShoppingCarts($shoppingCart);
        $onlineShoppingCart->setAmount(1);

        $manager->persist($shoppingCart);
        $manager->persist($onlineShoppingCart);
        $manager->flush();

        return $this->redirectToRoute('shopping_cart', ['id' => $shoppingCart->getId()]);



        return $this->render('shopping_cart/index.html.twig', [
            'shoppingCart' => $shoppingCart,
            'controller_name' => 'ShoppingCartController',
        ]);
    }*/

    /**
     * @Route("/shopping/cart/{id}", name="shopping_cart")
     */
    public function addToShoppingCart(Book $book)
    {
        $cart = $this->get("session")->get("cart");
        if(empty($cart)){
            $cart = array();
        }
        
        if(!in_array($book->getId(), $cart)){
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
    public function showShoppingCart(ObjectManager $em) 
    {
        $cart = $this->get("session")->get("cart");
   
        $lines = array();
        
        if(!empty($cart)){
            foreach($cart as $id){
                $book = $em->getRepository(Book::class)->find($id);
                $lines[] = $book;
            }
        }
       
        
        return $this->render('shopping_cart/index.html.twig', [
            "cartlines" => $lines
        ]);
    }
}
