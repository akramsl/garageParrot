<?php

namespace App\Repository;

use App\Entity\VehiclePicture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VehiclePicture>
 *
 * @method VehiclePicture|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehiclePicture|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehiclePicture[]    findAll()
 * @method VehiclePicture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiclePictureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehiclePicture::class);
    }

//    /**
//     * @return VehiclePicture[] Returns an array of VehiclePicture objects
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

//    public function findOneBySomeField($value): ?VehiclePicture
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
