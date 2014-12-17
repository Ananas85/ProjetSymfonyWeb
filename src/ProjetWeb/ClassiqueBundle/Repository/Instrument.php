<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-17-2014
 * Time: 18:22
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class Instrument extends EntityRepository {

    public function findAllAdapter() {
        $query = $this->createQueryBuilder('i');
        $query->orderBy("i.nomInstrument",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findInstrumentByInitialAdapter( $initial ) {
        $query = $this->createQueryBuilder('i');
        $query->where('i.nomInstrument LIKE :initial');
        $query->setParameter('initial',$initial.'%');
        $query->orderBy("i.nomInstrument",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

} 