<?php

namespace App\Repository;

use App\Entity\TypeJobs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeJobs>
 *
 * @method TypeJobs|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeJobs|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeJobs[]    findAll()
 * @method TypeJobs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeJobsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeJobs::class);
    }

    //    /**
    //     * @return TypeJobs[] Returns an array of TypeJobs objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?TypeJobs
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
