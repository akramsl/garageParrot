<?php

namespace App\Repository;

use App\Entity\VehicleContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VehicleContact>
 *
 * @method VehicleContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehicleContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehicleContact[]    findAll()
 * @method VehicleContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehicleContact::class);
    }

//    /**
//     * @return VehicleContact[] Returns an array of VehicleContact objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VehicleContact
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
