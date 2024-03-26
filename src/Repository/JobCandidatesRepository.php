<?php

namespace App\Repository;

use App\Entity\JobCandidates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JobCandidates>
 *
 * @method JobCandidates|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobCandidates|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobCandidates[]    findAll()
 * @method JobCandidates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobCandidatesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobCandidates::class);
    }

    //    /**
    //     * @return JobCandidates[] Returns an array of JobCandidates objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('j.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?JobCandidates
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
