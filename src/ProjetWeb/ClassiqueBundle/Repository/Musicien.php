<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-14-2014
 * Time: 22:50
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;

class Musicien  extends EntityRepository {

    /**
     * @return array
     */
    public function findAllCompositeur() {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.composers", "c" );
        return $query->getQuery()->getResult();
    }

} 