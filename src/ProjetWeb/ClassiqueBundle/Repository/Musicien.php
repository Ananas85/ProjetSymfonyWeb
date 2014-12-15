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
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;

class Musicien  extends EntityRepository {

    /**
     * @return array
     */
    public function findAllCompositeurAdapter() {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.composers", "c" );

        $results = $query->getQuery()->getResult();
        $adapter = new ArrayAdapter($results);
        return new Pagerfanta($adapter);
    }

    public function findCompositeurByNaissanceAdapter($naissance) {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.composers", "c" );
        $query->where('m.anneeNaissance > :naissance');
        $query->setParameter('naissance',$naissance);
        $query->andWhere('m.anneeNaissance > :fin');
        $query->setParameter('fin',$naissance + 10);

        $results = $query->getQuery()->getResult();
        $adapter = new ArrayAdapter($results);
        return new Pagerfanta($adapter);
    }

    public function findCompositeurByInitialAdapter($initial) {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.composers", "c" );
        $query->where('m.nomMusicien LIKE :naissance');
        $query->setParameter('naissance',$initial.'%');


        $results = $query->getQuery()->getResult();
        $adapter = new ArrayAdapter($results);
        return new Pagerfanta($adapter);
    }

} 