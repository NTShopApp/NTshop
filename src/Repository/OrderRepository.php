<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Order>
 *
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function add(Order $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Order $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Order[] Returns an array of Order objects
     */
    public function orderdetail($value): array
    {
        return $this->createQueryBuilder('o')
            ->select('max(o.id) as oid')
            ->andWhere('o.userorder = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
      /**
     * @return Order[] Returns an array of Order objects
     */
    public function date($value): array
    {
        return $this->createQueryBuilder('o')
            ->select('o.Date')
            ->andWhere('o.id = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id','DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }
    /**
     * @return Order[] Returns an array of Order objects
     */
    public function userinfo($value): array
    {
        return $this->createQueryBuilder('o')
            ->select(' u.Name , u.Phone, u.Address')
            ->innerJoin('o.userorder', 'u')
            ->andWhere('o.userorder = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id','DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }
     /**
     * @return Order[] Returns an array of Order objects
     */
    public function billdetail($value): array
    {
        return $this->createQueryBuilder('o')
            ->select(' u.Name ')
            ->innerJoin('o.userorder', 'u')
            ->andWhere('o.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
            //SELECT u.name FROM `order` o inner join `user` u on u.id = o.userorder_id where o.id =79
    }
    /**
     * @return Order[] Returns an array of Order objects
     */
    public function billproduct($value): array
    {
        return $this->createQueryBuilder('o')
            ->select(' od.Quantity ,p.namepro, p.price ')
            ->innerJoin('o.oid', 'od')
            ->innerJoin('od.pid','p')
            ->andWhere('o.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
            //SELECT od.quantity ,p.namepro, p.price FROM `order`o 
            //INNER join `orderdetail` od on o.id = od.oid_id INNER join `product` p on od.pid_id = p.id where o.id =79
    }
        /**
     * @return Order[] Returns an array of Order objects
     */
    public function viewdate($value): array
    {
        return $this->createQueryBuilder('o')
            ->select(' o.Date ')
            
            ->andWhere('o.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
            //SELECT u.name FROM `order` o inner join `user` u on u.id = o.userorder_id where o.id =79
    }
     /**
     * @return Order[] Returns an array of Order objects
     */
    public function totalbill($value): array
    {
        return $this->createQueryBuilder('o')
            ->select('o.Total')
            ->andWhere('o.userorder = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id','DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }
     /**
     * @return Order[] Returns an array of Order objects
     */
    public function totaldetail($value): array
    {
        return $this->createQueryBuilder('o')
            ->select('o.Total')
            ->andWhere('o.id = :val')
            ->setParameter('val', $value)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Order[] Returns an array of Order objects
     */
    public function managerbill(): array
    {
        return $this->createQueryBuilder('o')
            ->orderBy('o.id','DESC')
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?Order
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
