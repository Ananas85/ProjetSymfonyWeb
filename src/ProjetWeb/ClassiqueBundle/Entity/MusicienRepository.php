<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-12-2014
 * Time: 14:38
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Entity;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

class MusicienRepository extends EntityRepository {

    public function myFindOne($id) {
        $qb = $this->createQueryBuilder('a');
        $qb->where('a.id = :id')
           ->setParameters('id',$id);
        return $qb->getQuery()->getResult();
    }
} 