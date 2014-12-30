<?php
namespace ProjetWeb\ClassiqueBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class Genre extends EntityRepository
{
    /**
     * @return Pagerfanta
     */
    public function findAllAdapter()
    {
        $query = $this->createQueryBuilder('g');
        $query->orderBy("g.libelleAbrege", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param $initial
     *
     * @return Pagerfanta
     */
    public function findGenreByInitialAdapter($initial)
    {
        $query = $this->createQueryBuilder('g');
        $query->where('g.libelleAbrege LIKE :initial');
        $query->setParameter('initial', "{$initial}%");
        $query->orderBy("g.libelleAbrege", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param $pattern
     *
     * @return array
     */
    public function findGenreByPattern($pattern)
    {
        $query = $this->createQueryBuilder('g');
        $query->where('g.libelleAbrege LIKE :pattern');
        $query->setParameter('pattern', "%{$pattern}%");
        $query->orderBy("g.libelleAbrege", 'ASC');

        return $query->getQuery()->getResult();
    }
}