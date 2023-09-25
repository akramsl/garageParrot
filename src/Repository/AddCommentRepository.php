<?php

namespace App\Repository;

use App\Entity\AddComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AddComment>
 *
 * @method AddComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method AddComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method AddComment[]    findAll()
 * @method AddComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AddComment::class);
    }

//    /**
//     * @return AddComment[] Returns an array of AddComment objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AddComment
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
