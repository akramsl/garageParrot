<?php

namespace App\Repository;

use App\Entity\VehicleListing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class VehicleListingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehicleListing::class);
    }

    /**
     * Récupère les marques distinctes
     *
     * @return string[] Un tableau de marques distinctes
     */
    public function findDistinctBrands(): array
    {
        $qb = $this->createQueryBuilder('v');
        $qb->select('DISTINCT v.brand');

        $result = $qb->getQuery()->getResult();

        // Transforme le résultat en un tableau simple de marques
        $brands = array_map(function ($item) {
            return $item['brand'];
        }, $result);

        return $brands;
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
