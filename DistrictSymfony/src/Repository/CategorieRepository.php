<?php

namespace App\Repository;

use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categorie>
 *
 * @method Categorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorie[]    findAll()
 * @method Categorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

    // public function getRandomCategories(int $limit): array
    // {
    //     $em = $this->getEntityManager();

    //     $query = $em->createQueryBuilder()
    //         ->select('c')
    //         ->from('App\Entity\Categorie', 'c')
    //         ->orderBy('RAND()')
    //         ->setMaxResults($limit)
    //         ->getQuery();

    //     return $query->getResult();
    // }
    public function getRandomCategories(int $limit): array
    {
        return $this->createQueryBuilder('c')
            ->select('c')
            ->orderBy('RAND()')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
