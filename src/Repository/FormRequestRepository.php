<?php

namespace App\Repository;

use App\Entity\FormRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FormRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormRequest[]    findAll()
 * @method FormRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormRequestRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FormRequest::class);
    }

//    /**
//     * @return FormRequest[] Returns an array of FormRequest objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormRequest
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
