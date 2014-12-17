<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-17-2014
 * Time: 08:30
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */


namespace ProjetWeb\ClassiqueBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

class Composer  extends EntityRepository {

    /**
     * @return array
     */
    public function findAllCompositeurAdapter() {
        $query = $this->createQueryBuilder( "c" );
        $query->distinct('codeMusicien');
        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

} 