<?php

namespace App\Repository;

use App\Entity\Prosup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Prosup>
 *
 * @method Prosup|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prosup|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prosup[]    findAll()
 * @method Prosup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProsupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prosup::class);
    }

    public function add(Prosup $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Prosup $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    /**
    * @return Product[] Returns an array of Product objects
    */
   public function findProductBySearch($name): array
   {
       return $this->createQueryBuilder('p')
           ->andWhere('p.namepro like :name')
           ->setParameter('name','%'.$name.'%')
           ->orderBy('p.idpro','ASC')
           ->getQuery()
           ->getResult()
       ;
   }
//        /**
//     * @return Product[] Returns an array of Product objects
//     */
//    public function findBrand($value): array
//    {

//        return $this->createQueryBuilder('p')
//        ->select("pro.id, pro.namepro , pro.price, pro.image, pro.infopro")
//        ->innerJoin('p.sup','s')
//        ->innerJoin('p.pro','pro')
//            ->andWhere('s.id = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    /**
//     * @return Prosup[] Returns an array of Prosup objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Prosup
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
