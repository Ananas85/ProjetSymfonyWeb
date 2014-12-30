<?php
namespace ProjetWeb\ClassiqueBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use ProjetWeb\ClassiqueBundle\Entity\Instrument as InstrumentEntity;

class Musicien extends EntityRepository
{
    /**
     * @return array
     */
    public function findAllCompositeurAdapter()
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.composers", "c");
        $query->orderBy("m.nomMusicien", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param $pattern
     *
     * @return array
     */
    public function findCompositeurByPattern($pattern)
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.composers", "c");
        $query->where('m.nomMusicien LIKE :pattern');
        $query->setParameter('pattern', "%{$pattern}%");
        $query->orderBy("m.nomMusicien", 'ASC');

        return $query->getQuery()->getResult();
    }

    /**
     * @param $naissance
     *
     * @return Pagerfanta
     */
    public function findCompositeurByNaissanceAdapter($naissance)
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.composers", "c");
        $query->where('m.anneeNaissance BETWEEN :naissance AND :fin');
        $query->setParameters(["naissance"=>$naissance, "fin"=>$naissance+10]);
        $query->orderBy("m.nomMusicien", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param $initial
     *
     * @return Pagerfanta
     */
    public function findCompositeurByInitialAdapter($initial)
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.composers", "c");
        $query->where('m.nomMusicien LIKE :naissance');
        $query->setParameter('naissance', "{$initial}%");
        $query->orderBy("m.nomMusicien", 'ASC');


        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @return array
     */
    public function findAllInterpreteAdapter()
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.interpreters", "i");
        $query->orderBy("m.nomMusicien", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param $pattern
     *
     * @return array
     */
    public function findInterpreteByPattern($pattern)
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.interpreters", "c");
        $query->where('m.nomMusicien LIKE :pattern');
        $query->setParameter('pattern', "%{$pattern}%");
        $query->orderBy("m.nomMusicien", 'ASC');

        return $query->getQuery()->getResult();
    }

    /**
     * @param $naissance
     *
     * @return Pagerfanta
     */
    public function findInterpreteByNaissanceAdapter($naissance)
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.interpreters", "i");
        $query->where('m.anneeNaissance BETWEEN :naissance AND :fin');
        $query->setParameters(["naissance"=>$naissance, "fin"=>$naissance+10]);
        $query->orderBy("m.nomMusicien", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param $initial
     *
     * @return Pagerfanta
     */
    public function findInterpreteByInitialAdapter($initial)
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.interpreters", "i");
        $query->where('m.nomMusicien LIKE :naissance');
        $query->setParameter('naissance', "{$initial}%");
        $query->orderBy("m.nomMusicien", 'ASC');


        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param InstrumentEntity $instrument
     *
     * @return Pagerfanta
     */
    public function findInterpreteByInstrumentAdapter(InstrumentEntity $instrument)
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.interpreters", "i");
        $query->join("m.codeInstrument", "inst");
        $query->where('m.codeInstrument = :instrument');
        $query->setParameter('instrument', $instrument->getCodeInstrument());
        $query->orderBy("m.nomMusicien", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @return array
     */
    public function findAllChefAdapter()
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.directions", "d");
        $query->orderBy("m.nomMusicien", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param $pattern
     *
     * @return array
     */
    public function findChefByPattern($pattern)
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.directions", "c");
        $query->where('m.nomMusicien LIKE :pattern');
        $query->setParameter('pattern', "%{$pattern}%");
        $query->orderBy("m.nomMusicien", 'ASC');

        return $query->getQuery()->getResult();
    }

    /**
     * @param $naissance
     *
     * @return Pagerfanta
     */
    public function findChefByNaissanceAdapter($naissance)
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.directions", "d");
        $query->where('m.anneeNaissance BETWEEN :naissance AND :fin');
        $query->setParameters(["naissance"=>$naissance, "fin"=>$naissance+10]);
        $query->orderBy("m.nomMusicien", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }

    /**
     * @param $initial
     *
     * @return Pagerfanta
     */
    public function findChefByInitialAdapter($initial)
    {
        $query = $this->createQueryBuilder("m");
        $query->join("m.directions", "d");
        $query->where('m.nomMusicien LIKE :naissance');
        $query->setParameter('naissance', "{$initial}%");
        $query->orderBy("m.nomMusicien", 'ASC');

        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($query));

        return $pagerfanta;
    }
}