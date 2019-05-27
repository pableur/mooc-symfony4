<?php

namespace App\Repository;

use App\Entity\Tunning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tunning|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tunning|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tunning[]    findAll()
 * @method Tunning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TunningRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tunning::class);
    }

    // /**
    //  * @return Tunning[] Returns an array of Tunning objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tunning
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
