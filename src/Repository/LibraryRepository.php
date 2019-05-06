<?php

namespace App\Repository;

use App\Entity\Library;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Library|null find($id, $lockMode = null, $lockVersion = null)
 * @method Library|null findOneBy(array $criteria, array $orderBy = null)
 * @method Library[]    findAll()
 * @method Library[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LibraryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Library::class);
    }

    // /**
    //  * @return Library[] Returns an array of Library objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findAllOrderedByName() {
        $qb = $this->createQueryBuilder('library')
                ->orderBy('library.name', 'ASC')
                ->getQuery();

        return $qb->execute();
    }

    /*
    public function findOneBySomeField($value): ?Library
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
