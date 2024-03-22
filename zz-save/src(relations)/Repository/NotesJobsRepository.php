<?php

namespace App\Repository;

use App\Entity\NotesJobs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NotesJobs>
 *
 * @method NotesJobs|null find($id, $lockMode = null, $lockVersion = null)
 * @method NotesJobs|null findOneBy(array $criteria, array $orderBy = null)
 * @method NotesJobs[]    findAll()
 * @method NotesJobs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotesJobsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotesJobs::class);
    }

    //    /**
    //     * @return NotesJobs[] Returns an array of NotesJobs objects
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

    //    public function findOneBySomeField($value): ?NotesJobs
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
