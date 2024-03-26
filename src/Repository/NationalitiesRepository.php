<?php

namespace App\Repository;

use App\Entity\Nationalities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Nationalities>
 *
 * @method Nationalities|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nationalities|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nationalities[]    findAll()
 * @method Nationalities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NationalitiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Nationalities::class);
    }

    //    /**
    //     * @return Nationalities[] Returns an array of Nationalities objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('n.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Nationalities
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
