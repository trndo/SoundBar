<?php

namespace App\Repository;

use App\Entity\Artists;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Artists|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artists|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artists[]    findAll()
 * @method Artists[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtistsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Artists::class);
    }

}
