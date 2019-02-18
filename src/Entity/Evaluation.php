<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="evaluation")
 */
 class Evaluation
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
             private $rating;
         
             /**
              * @ORM\Column(type="text")
             */
             private $comment;
         
             /**
              * @ORM\Column(type="boolean")
             */
             private $favorite;
      
             /**
              * @ORM\Column(type="datetime")
              */
             private $dateEvaluation;
         
             public function getId(): ?int
             {
                 return $this->id;
             }
         
             public function getRating(): ?int
             {
                 return $this->rating;
             }
         
             public function setRating(int $rating): self
             {
                 $this->rating = $rating;
         
                 return $this;
             }
         
             public function getComment(): ?string
             {
                 return $this->comment;
             }
         
             public function setComment(string $comment): self
             {
                 $this->comment = $comment;
         
                 return $this;
             }
         
             public function getFavorite(): ?bool
             {
                 return $this->favorite;
             }
         
             public function setFavorite(bool $favorite): self
             {
                 $this->favorite = $favorite;
         
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
         
             public function getUsers(): ?User
             {
                 return $this->users;
             }
         
             public function setUsers(?User $users): self
             {
                 $this->users = $users;
         
                 return $this;
             }
   
             public function getDateEvaluation(): ?\DateTimeInterface
             {
                 return $this->dateEvaluation;
             }

             public function setDateEvaluation(\DateTimeInterface $dateEvaluation): self
             {
                 $this->dateEvaluation = $dateEvaluation;

                 return $this;
             }
         
         
         }





