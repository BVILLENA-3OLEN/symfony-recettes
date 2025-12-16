<?php

namespace App\Repository;

use App\Entity\Recette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recette>
 *
 * @method Recette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recette[]    findAll()
 * @method Recette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recette::class);
    }

    public function getAllForListe(): array
    {
        return $this
            ->createQueryBuilder('r')
            ->leftJoin(join: 'r.ingredientRecettes', alias: 'i_r')
            ->addSelect('i_r')
            ->leftJoin(join: 'i_r.ingredient', alias: 'i')
            ->addSelect('i')
            ->leftJoin(join: 'i_r.typeQuantite', alias: 'qt_t')
            ->addSelect('qt_t')
            ->orderBy('r.nom')
            ->getQuery()
            ->getResult();
    }
}
