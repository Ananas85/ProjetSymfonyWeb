<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-17-2014
 * Time: 12:15
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class Genre extends EntityRepository {

    public function findAllAdapter() {
        $query = $this->createQueryBuilder('g');
        $query->orderBy("g.libelleAbrege",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findGenreByInitialAdapter( $initial ) {
        $query = $this->createQueryBuilder('g');
        $query->where('g.libelleAbrege LIKE :initial');
        $query->setParameter('initial',$initial.'%');
        $query->orderBy("g.libelleAbrege",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

} 