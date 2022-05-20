<?php

namespace App\Repository;

use App\Entity\SaleOrderLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SaleOrderLine>
 *
 * @method SaleOrderLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method SaleOrderLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method SaleOrderLine[]    findAll()
 * @method SaleOrderLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SaleOrderLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SaleOrderLine::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SaleOrderLine $entity, bool $flush = false): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(SaleOrderLine $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }



    public function findsum()
    {
        return $this->createQueryBuilder('s')
                    ->select('count(s)')
                    ->getQuery()
                    ->getSingleScalarResult()
        ;
    }


    public function finddate()
    {
        return $this->createQueryBuilder('m')
                    ->select('m.create_date')
                    ->getQuery()
                    ->getResult()
        ;
    }

    public function findprice()
    {
        return $this->createQueryBuilder('n')
                    ->select('n.price_total')
                    ->getQuery()
                    ->getScalarResult()
        ;
    }
//    /**
//     * @return SaleOrderLine[] Returns an array of SaleOrderLine objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SaleOrderLine
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
