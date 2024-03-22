<?php

namespace App\Repository;

use App\Entity\NotesCandidates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NotesCandidates>
 *
 * @method NotesCandidates|null find($id, $lockMode = null, $lockVersion = null)
 * @method NotesCandidates|null findOneBy(array $criteria, array $orderBy = null)
 * @method NotesCandidates[]    findAll()
 * @method NotesCandidates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotesCandidatesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotesCandidates::class);
    }

    //    /**
    //     * @return NotesCandidates[] Returns an array of NotesCandidates objects
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

    //    public function findOneBySomeField($value): ?NotesCandidates
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
