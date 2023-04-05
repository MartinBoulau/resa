<?php

namespace App\Repository;

use App\Entity\Unavailables;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr;

/**
 * @extends ServiceEntityRepository<Unavailables>
 *
 * @method Unavailables|null find($id, $lockMode = null, $lockVersion = null)
 * @method Unavailables|null findOneBy(array $criteria, array $orderBy = null)
 * @method Unavailables[]    findAll()
 * @method Unavailables[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnavailablesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Unavailables::class);
    }

    public function save(Unavailables $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Unavailables $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByWeekVehUnavailable($id_v, $nb_week)
    {
        // dd($id_v,$nb_week);
        return $this->createQueryBuilder('u')
            ->select('u, v')
            ->innerJoin('App\Entity\Vehicules', 'v', Expr\Join::WITH, 'v.id = u.vehicule')
            // ->innerJoin('App\Entity\Persons', 'p', Expr\Join::WITH, 'p.id = r.person')
            // ->innerJoin('App\Entity\Persons', 'pr', Expr\Join::WITH, 'pr.id = r.person_resa')
            ->where('u.vehicule = ' . $id_v)
            // ->where('r.nb_week = ' . $nb_week)
            ->getQuery()
            ->getScalarResult();
    }

//    /**
//     * @return Unavailables[] Returns an array of Unavailables objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Unavailables
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
