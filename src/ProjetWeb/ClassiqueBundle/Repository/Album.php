<?php

namespace ProjetWeb\ClassiqueBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;


class Album extends EntityRepository {

    /**
     * @param Musicien $musicien
     *
     * @return array
     */
    public function findByMusicien( Musicien $musicien ) {
        $query = $this->createQueryBuilder( "a" );
        $query->join( "a.codeGenre", "g" );
        $query->join( "g.musiciens", "m" );
        $query->where( "m.codeMusicien = :musicien" );
        $query->setParameter( "musicien", $musicien );
        $query->setMaxResults(10);
        return $query->getQuery()->getResult();
    }
}