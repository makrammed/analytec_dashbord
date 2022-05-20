<?php

namespace App\Repository;

use App\Entity\AccountMove;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AccountMove>
 *
 * @method AccountMove|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccountMove|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccountMove[]    findAll()
 * @method AccountMove[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccountMoveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccountMove::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AccountMove $entity, bool $flush = false): void
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
    public function remove(AccountMove $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }



    public function findsum()
    {
        return $this->createQueryBuilder('c')
                    ->select('SUM(c.amount_total)')
                    ->getQuery()
                    ->getSingleScalarResult()
        ;
    }

//    /**
//     * @return AccountMove[] Returns an array of AccountMove objects
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

//    public function findOneBySomeField($value): ?AccountMove
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
