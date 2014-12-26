<?php
namespace ProjetWeb\ClassiqueBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class Instrument extends EntityRepository
{
    /**
     * @return Pagerfanta
     */
    public function findAllAdapter()
    {
        $query = $this->createQueryBuilder('i');
        $query->orderBy("i.nomInstrument", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param $initial
     *
     * @return Pagerfanta
     */
    public function findInstrumentByInitialAdapter($initial)
    {
        $query = $this->createQueryBuilder('i');
        $query->where('i.nomInstrument LIKE :initial');
        $query->setParameter('initial', $initial . '%');
        $query->orderBy("i.nomInstrument", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }
}