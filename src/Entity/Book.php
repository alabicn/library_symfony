<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $src_image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alt_image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title_image;

    /**
     * @ORM\Column(type="text")
     */
    private $details;

    /**
     * @ORM\Column(type="date")
     */
    private $publication_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $publisher;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $original_title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $edition_language;

    /**
     * @ORM\Column(type="integer")
     */
    private $pages;

    /**
     * @ORM\Column(type="date")
     */
    private $first_published;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $SKU;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Evaluation", mappedBy="books", fetch="EXTRA_LAZY")
     */
    private $userbooks;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Library", mappedBy="books")
     */
    private $libraries;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="books")
     */
    private $author;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Edition", mappedBy="books")
     */
    private $editions;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Genre", mappedBy="books")
     */
    private $genres;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OnlineShoppingCart", mappedBy="books", fetch="EXTRA_LAZY")
     */
    private $shoppingcartbooks;

    const VAT = 1.2;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->libraries = new ArrayCollection();
        $this->types = new ArrayCollection();
        $this->genres = new ArrayCollection();
        $this->shoppingCarts = new ArrayCollection();
        $this->userbooks = new ArrayCollection();
        $this->shoppingcartbooks = new ArrayCollection();
        $this->editions = new ArrayCollection();
    }    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSrcImage(): ?string
    {
        return $this->src_image;
    }

    public function setSrcImage(string $src_image): self
    {
        $this->src_image = $src_image;

        return $this;
    }

    public function getAltImage(): ?string
    {
        return $this->alt_image;
    }

    public function setAltImage(string $alt_image): self
    {
        $this->alt_image = $alt_image;

        return $this;
    }

    public function getTitleImage(): ?string
    {
        return $this->title_image;
    }

    public function setTitleImage(string $title_image): self
    {
        $this->title_image = $title_image;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(\DateTimeInterface $publication_date): self
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getOriginalTitle(): ?string
    {
        return $this->original_title;
    }

    public function setOriginalTitle(string $original_title): self
    {
        $this->original_title = $original_title;

        return $this;
    }

    public function getEditionLanguage(): ?string
    {
        return $this->edition_language;
    }

    public function setEditionLanguage(string $edition_language): self
    {
        $this->edition_language = $edition_language;

        return $this;
    }

    public function getPages(): ?int
    {
        return $this->pages;
    }

    public function setPages(int $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    public function getFirstPublished(): ?\DateTimeInterface
    {
        return $this->first_published;
    }

    public function setFirstPublished(\DateTimeInterface $first_published): self
    {
        $this->first_published = $first_published;

        return $this;
    }

    public function getPrice(): ?float
    {
        $this->price = round(($this->price * self::VAT),2);

        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSKU(): ?int
    {
        return $this->SKU;
    }

    public function setSKU(int $SKU): self
    {
        $this->SKU = $SKU;
        
        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addBook($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeBook($this);
        }

        return $this;
    }

    /**
     * @return Collection|Library[]
     */
    public function getLibraries(): Collection
    {
        return $this->libraries;
    }

    public function addLibrary(Library $library): self
    {
        if (!$this->libraries->contains($library)) {
            $this->libraries[] = $library;
            $library->addBook($this);
        }

        return $this;
    }

    public function removeLibrary(Library $library): self
    {
        if ($this->libraries->contains($library)) {
            $this->libraries->removeElement($library);
            $library->removeBook($this);
        }

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|Type[]
     */
    public function getEditions(): Collection
    {
        return $this->editions;
    }

    public function addEdition(Edition $edition): self
    {
        if (!$this->editions->contains($edition)) {
            $this->editions[] = $edition;
            $edition->addBook($this);
        }

        return $this;
    }

    public function removeEdition(Edition $edition): self
    {
        if ($this->editions->contains($edition)) {
            $this->editions->removeElement($edition);
            $edition->removeBook($this);
        }

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genres->contains($genre)) {
            $this->genres[] = $genre;
            $genre->addBook($this);
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        if ($this->genres->contains($genre)) {
            $this->genres->removeElement($genre);
            $genre->removeBook($this);
        }

        return $this;
    }

    /**
     * @return Collection|ShoppingCart[]
     */
    public function getShoppingCarts(): Collection
    {
        return $this->shoppingCarts;
    }

    public function addShoppingCart(ShoppingCart $shoppingCart): self
    {
        if (!$this->shoppingCarts->contains($shoppingCart)) {
            $this->shoppingCarts[] = $shoppingCart;
            $shoppingCart->addBook($this);
        }

        return $this;
    }

    public function removeShoppingCart(ShoppingCart $shoppingCart): self
    {
        if ($this->shoppingCarts->contains($shoppingCart)) {
            $this->shoppingCarts->removeElement($shoppingCart);
            $shoppingCart->removeBook($this);
        }

        return $this;
    }

    /**
     * @return Collection|UserBook[]
     */
    public function getUserbooks(): Collection
    {
        return $this->userbooks;
    }

    public function addUserbook(UserBook $userbook): self
    {
        if (!$this->userbooks->contains($userbook)) {
            $this->userbooks[] = $userbook;
            $userbook->setBooks($this);
        }

        return $this;
    }

    public function removeUserbook(UserBook $userbook): self
    {
        if ($this->userbooks->contains($userbook)) {
            $this->userbooks->removeElement($userbook);
            // set the owning side to null (unless already changed)
            if ($userbook->getBooks() === $this) {
                $userbook->setBooks(null);
            }
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
            $shoppingcartbook->setBooks($this);
        }

        return $this;
    }

    public function removeShoppingcartbook(OnlineShoppingCart $shoppingcartbook): self
    {
        if ($this->shoppingcartbooks->contains($shoppingcartbook)) {
            $this->shoppingcartbooks->removeElement($shoppingcartbook);
            // set the owning side to null (unless already changed)
            if ($shoppingcartbook->getBooks() === $this) {
                $shoppingcartbook->setBooks(null);
            }
        }

        return $this;
    }
}
