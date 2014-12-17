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
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

class Musicien  extends EntityRepository {

    /**
     * @return array
     */
    public function findAllCompositeurAdapter() {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.composers", "c" );
        $query->orderBy("m.nomMusicien",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findCompositeurByNaissanceAdapter($naissance) {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.composers", "c" );
        $query->where('m.anneeNaissance > :naissance');
        $query->setParameter('naissance',$naissance);
        $query->andWhere('m.anneeNaissance > :fin');
        $query->setParameter('fin',$naissance + 10);
        $query->orderBy("m.nomMusicien",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findCompositeurByInitialAdapter($initial) {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.composers", "c" );
        $query->where('m.nomMusicien LIKE :naissance');
        $query->setParameter('naissance',$initial.'%');
        $query->orderBy("m.nomMusicien",'ASC');


        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    /**
     * @return array
     */
    public function findAllInterpreteAdapter() {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.interpreters", "i" );
        $query->orderBy("m.nomMusicien",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findInterpreteByNaissanceAdapter($naissance) {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.interpreters", "i" );
        $query->where('m.anneeNaissance > :naissance');
        $query->setParameter('naissance',$naissance);
        $query->andWhere('m.anneeNaissance > :fin');
        $query->setParameter('fin',$naissance + 10);
        $query->orderBy("m.nomMusicien",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findInterpreteByInitialAdapter($initial) {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.interpreters", "i" );
        $query->where('m.nomMusicien LIKE :naissance');
        $query->setParameter('naissance',$initial.'%');
        $query->orderBy("m.nomMusicien",'ASC');


        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    /**
     * @return array
     */
    public function findAllChefAdapter() {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.directions", "d" );
        $query->orderBy("m.nomMusicien",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findChefByNaissanceAdapter($naissance) {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.directions", "d" );
        $query->where('m.anneeNaissance > :naissance');
        $query->setParameter('naissance',$naissance);
        $query->andWhere('m.anneeNaissance > :fin');
        $query->setParameter('fin',$naissance + 10);
        $query->orderBy("m.nomMusicien",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;

    }

    public function findChefByInitialAdapter($initial) {
        $query = $this->createQueryBuilder( "m" );
        $query->join( "m.directions", "d" );
        $query->where('m.nomMusicien LIKE :naissance');
        $query->setParameter('naissance',$initial.'%');
        $query->orderBy("m.nomMusicien",'ASC');

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }


} 