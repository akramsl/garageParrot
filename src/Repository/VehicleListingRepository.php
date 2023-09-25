<?php

namespace App\Repository;

use App\Entity\VehicleListing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VehicleListing>
 *
 * @method VehicleListing|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehicleListing|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehicleListing[]    findAll()
 * @method VehicleListing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleListingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehicleListing::class);
    }

//    /**
//     * @return VehicleListing[] Returns an array of VehicleListing objects
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

//    public function findOneBySomeField($value): ?VehicleListing
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
