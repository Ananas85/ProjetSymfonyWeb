<?php
namespace ProjetWeb\ClassiqueBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use ProjetWeb\ClassiqueBundle\Entity\Album as AlbumEntity;

class Disque extends EntityRepository
{

    /**
     * @param AlbumEntity $album
     *
     * @return array
     */
    public function findByAlbum(AlbumEntity $album)
    {
        $query = $this->createQueryBuilder('d');
        $query->where('d.codeAlbum = :album');
        $query->setParameter("album", $album);

        return $query->getQuery()->getResult();
    }
}