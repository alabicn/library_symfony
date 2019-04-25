<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $surname;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $about;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Book", mappedBy="author")
     */
    private $books;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\File(    
     *        maxSize = "1M",
     *        mimeTypes = {"image/jpeg", "image/png"},
     *        mimeTypesMessage = "Please upload a valid image",
     *        groups = {"create"}
     * )
     */
    private $src_image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alt_image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title_image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Quote", mappedBy="author")
     */
    private $quotes;

    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->quotes = new ArrayCollection();
    }

    public function getId(): ? int
    {
        return $this->id;
    }

    public function getName(): ? string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ? string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getAbout(): ? string
    {
        return $this->about;
    }

    public function setAbout(string $about): self
    {
        $this->about = $about;

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
            $book->setAuthor($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            // set the owning side to null (unless already changed)
            if ($book->getAuthor() === $this) {
                $book->setAuthor(null);
            }
        }

        return $this;
    }

    public function getSrcImage(): ? string
    {
        return $this->src_image;
    }

    public function setSrcImage(? string $src_image): self
    {
       if($src_image == null){
        $this->src_image = 'img_author/default.png';
        $this->alt_image = 'default.png';
        $this->title_image = 'Default photo';           
       }
       else{
            $this->src_image = $src_image;
       }
       

        return $this;
    }

    public function getAltImage(): ? string
    {
        return $this->alt_image;
    }

    public function setAltImage(? string $alt_image): self
    {
        $this->alt_image = $alt_image;

        return $this;
    }

    public function getTitleImage(): ? string
    {
        return $this->title_image;
    }

    public function setTitleImage(? string $title_image): self
    {
        $this->title_image = $title_image;

        return $this;
    }

    /**
     * @return Collection|Quote[]
     */
    public function getQuotes(): Collection
    {
        return $this->quotes;
    }

    public function addQuote(Quote $quote): self
    {
        if (!$this->quotes->contains($quote)) {
            $this->quotes[] = $quote;
            $quote->setAuthor($this);
        }

        return $this;
    }

    public function removeQuote(Quote $quote): self
    {
        if ($this->quotes->contains($quote)) {
            $this->quotes->removeElement($quote);
            // set the owning side to null (unless already changed)
            if ($quote->getAuthor() === $this) {
                $quote->setAuthor(null);
            }
        }

        return $this;
    }
}
