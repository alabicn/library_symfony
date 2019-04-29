<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="evaluation")
 * @ORM\Entity(repositoryClass="App\Repository\EvaluationRepository")
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
              * @ORM\ManyToOne(targetEntity="Book", inversedBy="evaluations")
             * @ORM\JoinColumn(nullable=false)
             */
    private $book;

    /**
             * @ORM\ManyToOne(targetEntity="User", inversedBy="evaluations")
             * @ORM\JoinColumn(nullable=false)
             */
    private $user;

    /**
              * @ORM\Column(type="integer", nullable=true)
             */
    private $rating;

    /**
              * @ORM\Column(type="text", nullable=true)
             */
    private $comment;

    /**
              * @ORM\Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
              */
    private $dateEvaluation;

    public function getId(): ? int
    {
        return $this->id;
    }

    public function getRating(): ? int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getComment(): ? string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getBook(): ? Book
    {
        return $this->book;
    }

    public function setBook(? Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getUser(): ? User
    {
        return $this->user;
    }

    public function setUser(? User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDateEvaluation(): ? \DateTimeInterface
    {
        return $this->dateEvaluation;
    }

    public function setDateEvaluation(\DateTimeInterface $dateEvaluation): self
    {
        $this->dateEvaluation = $dateEvaluation;

        return $this;
    }
}
