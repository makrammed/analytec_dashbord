<?php

namespace App\Repository;

use App\Entity\WebsiteVisitor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WebsiteVisitor>
 *
 * @method WebsiteVisitor|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebsiteVisitor|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebsiteVisitor[]    findAll()
 * @method WebsiteVisitor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebsiteVisitorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WebsiteVisitor::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(WebsiteVisitor $entity, bool $flush = false): void
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
    public function remove(WebsiteVisitor $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findvisitor()
    {
        return $this->createQueryBuilder('a')
                    ->select('SUM(a.visit_count)')
                    ->getQuery()
                    ->getSingleScalarResult()
        ;
    }
    public function findregion()
    {
        return $this->createQueryBuilder('q')
                    ->select('q.timezone , max(q.visit_count)')
                    ->getQuery()
                    ->getSingleScalarResult()
        ;
    }


//    /**
//     * @return WebsiteVisitor[] Returns an array of WebsiteVisitor objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WebsiteVisitor
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
