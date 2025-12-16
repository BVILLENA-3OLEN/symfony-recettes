<?php

namespace App\Repository;

use App\Entity\TypeQuantite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeQuantite>
 *
 * @method TypeQuantite|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeQuantite|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeQuantite[]    findAll()
 * @method TypeQuantite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeQuantiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeQuantite::class);
    }
}
