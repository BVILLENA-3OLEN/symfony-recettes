<?php

namespace App\Repository;

use App\Entity\IngredientRecette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IngredientRecette>
 *
 * @method IngredientRecette|null find($id, $lockMode = null, $lockVersion = null)
 * @method IngredientRecette|null findOneBy(array $criteria, array $orderBy = null)
 * @method IngredientRecette[]    findAll()
 * @method IngredientRecette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngredientRecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IngredientRecette::class);
    }
}
