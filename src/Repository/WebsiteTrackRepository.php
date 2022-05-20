<?php

namespace App\Repository;

use App\Entity\WebsiteTrack;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WebsiteTrack>
 *
 * @method WebsiteTrack|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebsiteTrack|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebsiteTrack[]    findAll()
 * @method WebsiteTrack[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebsiteTrackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WebsiteTrack::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(WebsiteTrack $entity, bool $flush = false): void
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
    public function remove(WebsiteTrack $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

//    /**
//     * @return WebsiteTrack[] Returns an array of WebsiteTrack objects
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

//    public function findOneBySomeField($value): ?WebsiteTrack
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
