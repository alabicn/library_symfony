<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="online_shopping_cart")
 */
 class OnlineShoppingCart{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="shoppingcartbooks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $books;

    /**
     * @ORM\ManyToOne(targetEntity="ShoppingCart", inversedBy="shoppingcartbooks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shoppingCarts;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getBooks(): ?Book
    {
        return $this->books;
    }

    public function setBooks(?Book $books): self
    {
        $this->books = $books;

        return $this;
    }

    public function getShoppingCarts(): ?ShoppingCart
    {
        return $this->shoppingCarts;
    }

    public function setShoppingCarts(?ShoppingCart $shoppingCarts): self
    {
        $this->shoppingCarts = $shoppingCarts;

        return $this;
    }


    
}