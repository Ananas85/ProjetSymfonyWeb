<?php
namespace ProjetWeb\ClassiqueBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use ProjetWeb\ClassiqueBundle\Entity\Instrument as InstrumentEntity;
use ProjetWeb\ClassiqueBundle\Entity\Musicien as MusicienEntity;
use ProjetWeb\ClassiqueBundle\Entity\Orchestres as OrchestresEntity;
use ProjetWeb\ClassiqueBundle\Entity\Genre as GenreEntity;
use ProjetWeb\ClassiqueBundle\Entity\Genre as AlbumEntity;

class Album extends EntityRepository
{
    /**
     * @param MusicienEntity $musicien
     *
     * @return Pagerfanta
     */
    public function findByCompositeur(MusicienEntity $musicien)
    {
        $query = $this->createQueryBuilder('a');
        $query->join("a.disques", "d");
        $query->join("d.compositiondisques", "cd");
        $query->join("cd.codeMorceau", "enr");
        $query->join("enr.codeComposition", "cc");
        $query->join("cc.compositionoeuvres", "co");
        $query->join("co.codeOeuvre", "o");
        $query->join("o.composers", "c");
        $query->join("c.codeMusicien", "m");
        $query->where("m.codeMusicien = :musicien");
        $query->setParameter("musicien", $musicien->getCodeMusicien());

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param MusicienEntity $musicien
     *
     * @return Pagerfanta
     */
    public function findByInterprete(MusicienEntity $musicien)
    {
        $query = $this->createQueryBuilder('a');
        $query->join("a.disques", "d");
        $query->join("d.compositiondisques", "cd");
        $query->join("cd.codeMorceau", "enr");
        $query->join("enr.interpreters", "i");
        $query->join("i.codeMusicien", "m");
        $query->where("m.codeMusicien = :musicien");
        $query->setParameter("musicien", $musicien);

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param MusicienEntity $musicien
     *
     * @return Pagerfanta
     */
    public function findByChef(MusicienEntity $musicien)
    {
        $query = $this->createQueryBuilder('a');
        $query->join("a.disques", "d");
        $query->join("d.compositiondisques", "cd");
        $query->join("cd.codeMorceau", "enr");
        $query->join("enr.directions", "di");
        $query->join("di.codeMusicien", "m");
        $query->where("m.codeMusicien = :musicien");
        $query->setParameter("musicien", $musicien);

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param OrchestresEntity $orchestres
     *
     * @return Pagerfanta
     */
    public function findByOrchestre(OrchestresEntity $orchestres)
    {
        $query = $this->createQueryBuilder('a');
        $query->join("a.disques", "d");
        $query->join("d.compositiondisques", "cd");
        $query->join("cd.codeMorceau", "enr");
        $query->join("enr.directions", "di");
        $query->join("di.codeOrchestre", "o");
        $query->where("o.codeOrchestre = :orchestre");
        $query->setParameter("orchestre", $orchestres);

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param GenreEntity $genre
     *
     * @return Pagerfanta
     */
    public function findByGenre(GenreEntity $genre)
    {
        $query = $this->createQueryBuilder('a');
        $query->where("a.codeGenre = :genre");
        $query->setParameter("genre", $genre);

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param InstrumentEntity $instrument
     *
     * @return Pagerfanta
     */
    public function findByInstrument(InstrumentEntity $instrument)
    {
        $query = $this->createQueryBuilder('a');
        $query->join("a.disques", "d");
        $query->join("d.compositiondisques", "cd");
        $query->join("cd.codeMorceau", "enr");
        $query->join("enr.interpreters", "int");
        $query->join("int.codeInstrument", "inst");
        $query->where("inst.codeInstrument = :instrument");
        $query->setParameter("instrument", $instrument);

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }
}