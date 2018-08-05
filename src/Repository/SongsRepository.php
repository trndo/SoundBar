<?php

namespace App\Repository;

use App\Entity\Songs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Songs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Songs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Songs[]    findAll()
 * @method Songs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SongsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Songs::class);
    }

    public function findBySearchValue($searchValue)
    {
        $qb=$this->createQueryBuilder('s')
            ->select("s.SongName","s.Duration","s.Size","s.BitRate","s.Path","s.Description")
            ->leftJoin("s.Artist","a")
            ->addSelect('a.Artist_name')
            ->where("s.SongName LIKE :searchValue")
            ->orWhere('s.Description LIKE :searchValue')
            ->orWhere("s.Location LIKE :searchValue")
            ->orWhere("a.Artist_name LIKE :searchValue")
            ->setParameter('searchValue','%'.$searchValue.'%')
            ->getQuery();

            return $qb->execute();
    }
}
