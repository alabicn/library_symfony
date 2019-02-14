<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShoppingCartRepository")
 */
class ShoppingCart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    private $creation_date;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ip_adress;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OnlineShoppingCart", mappedBy="shoppingCarts")
     */
    private $shoppingcartbooks;

    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->shoppingcartbooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getIpAdress(): ?string
    {
        return $this->ip_adress;
    }

    public function setIpAdress(string $ip_adress): self
    {
        $this->ip_adress = $ip_adress;

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
        }

        return $this;
    }

    /**
     * @return Collection|OnlineShoppingCart[]
     */
    public function getShoppingcartbooks(): Collection
    {
        return $this->shoppingcartbooks;
    }

    public function addShoppingcartbook(OnlineShoppingCart $shoppingcartbook): self
    {
        if (!$this->shoppingcartbooks->contains($shoppingcartbook)) {
            $this->shoppingcartbooks[] = $shoppingcartbook;
            $shoppingcartbook->setShoppingCarts($this);
        }

        return $this;
    }

    public function removeShoppingcartbook(OnlineShoppingCart $shoppingcartbook): self
    {
        if ($this->shoppingcartbooks->contains($shoppingcartbook)) {
            $this->shoppingcartbooks->removeElement($shoppingcartbook);
            // set the owning side to null (unless already changed)
            if ($shoppingcartbook->getShoppingCarts() === $this) {
                $shoppingcartbook->setShoppingCarts(null);
            }
        }

        return $this;
    }
}
