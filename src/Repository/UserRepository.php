<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findAllOrderedByName() {
        $qb = $this->createQueryBuilder('user')
                    ->getQuery();

        return $qb->execute();
    }

    public function findAllOrderedByRole() {
        $qb = $this->createQueryBuilder('user')
                    ->orderBy('user.roles', 'DESC')
                    ->getQuery();

        return $qb->execute();
    }
}
