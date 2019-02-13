<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="evaluation")
 */
 class UserBook
             {
                /**
                 * @ORM\Id
                 * @ORM\GeneratedValue(strategy="AUTO")
                 * @ORM\Column(type="integer")
                 */
                private $id;
            
                /**
                 * @ORM\ManyToOne(targetEntity="Book", inversedBy="userbooks")
                 * @ORM\JoinColumn(nullable=false)
                 */
                private $books;
            
                /**
                 * @ORM\ManyToOne(targetEntity="User", inversedBy="userbooks")
                 * @ORM\JoinColumn(nullable=false)
                 */
                private $users;
            
                /**
                 * @ORM\Column(type="integer")
                 */
                private $ratings;
            
                /**
                 * @ORM\Column(type="text")
                 */
                private $comment;
            
                /**
                 * @ORM\Column(type="boolean")
                 */
                private $favorite;
            
                public function getId()
                {
                    return $this->id;
                }
            
                public function getBook()
                {
                    return $this->book;
                }
            
                public function getUser()
                {
                    return $this->user;
                }
            
                public function getRatings()
                {
                    return $this->ratings;
                }
            
                public function getComment()
                {
                    return $this->comment;
                }
            
                public function getFavorite()
                {
                    return $this->favorite;
                }
            
                public function setBook($book)
                {
                    $this->book = $book;
                }
            
                public function setUser($user)
                {
                    $this->user = $user;
                }
            
                public function setRatings($ratings)
                {
                    $this->ratings = $ratings;
                }
            
                public function setComment($comment)
                {
                    $this->comment = $comment;
                }
            
                public function setFavorite($favorite)
                {
                    $this->favorite = $favorite;
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
   
                public function getUsers(): ?User
                {
                    return $this->users;
                }

                public function setUsers(?User $users): self
                {
                    $this->users = $users;

                    return $this;
                }
             }





