<?php
namespace ProjetWeb\ClassiqueBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use ProjetWeb\ClassiqueBundle\Entity\Disque as DisqueEntity;

class Enregistrement extends EntityRepository
{
    /**
     * @param DisqueEntity $disque
     *
     * @return array
     */
    public function findByDisque(DisqueEntity $disque)
    {
        $query = $this->createQueryBuilder('e');
        $query->join('e.compositiondisques', 'cd');
        $query->join('cd.codeDisque', 'd');
        $query->where('d.codeDisque = :disque');
        $query->setParameter('disque', $disque);

        return $query->getQuery()->getResult();
    }
}