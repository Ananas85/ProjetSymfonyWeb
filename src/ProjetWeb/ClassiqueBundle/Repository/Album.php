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

class Album extends EntityRepository {

    /**
     * @param Musicien $musicien
     *
     * @return array
     */
    public function findByMusicien( MusicienEntity $musicien ) {
        $query = $this->createQueryBuilder( "a" );
        $query->join( "a.codeGenre", "g" );
        $query->join( "g.musiciens", "m" );
        $query->where( "m.codeMusicien = :musicien" );
        $query->setParameter( "musicien", $musicien );
        $query->setMaxResults(10);
        return $query->getQuery()->getResult();
    }

    public function findByMusicienAdapter( MusicienEntity $musicien ) {
        $query = $this->createQueryBuilder( "a" );
        $query->join( "a.codeGenre", "g" );
        $query->join( "g.musiciens", "m" );
        $query->where( "m.codeMusicien = :musicien" );
        $query->setParameter( "musicien", $musicien );
        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findByCompositeur(MusicienEntity $musicien) {
        $query = $this->createQueryBuilder('a');
        $query->join("a.disques","d");
        $query->join("d.compositiondisques","cd");
        $query->join("cd.codeMorceau","enr");
        $query->join("enr.codeComposition","cc");
        $query->join("cc.compositionoeuvres","co");
        $query->join("co.codeOeuvre","o");
        $query->join("o.composers","c");
        $query->join("c.codeMusicien","m");
        $query->where("m.codeMusicien = :musicien");
        $query->setParameter("musicien",$musicien);

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findByInterprete(MusicienEntity $musicien) {
        $query = $this->createQueryBuilder('a');
        $query->join("a.disques","d");
        $query->join("d.compositiondisques","cd");
        $query->join("cd.codeMorceau","enr");
        $query->join("enr.interpreters","i");
        $query->join("i.codeMusicien","m");
        $query->where("m.codeMusicien = :musicien");
        $query->setParameter("musicien",$musicien);

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findByChef(MusicienEntity $musicien) {
        $query = $this->createQueryBuilder('a');
        $query->join("a.disques","d");
        $query->join("d.compositiondisques","cd");
        $query->join("cd.codeMorceau","enr");
        $query->join("enr.directions","di");
        $query->join("di.codeMusicien","m");
        $query->where("m.codeMusicien = :musicien");
        $query->setParameter("musicien",$musicien);

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findByOrchestre( OrchestresEntity $orchestres ) {
        $query = $this->createQueryBuilder('a');
        $query->join("a.disques","d");
        $query->join("d.compositiondisques","cd");
        $query->join("cd.codeMorceau","enr");
        $query->join("enr.directions","di");
        $query->join("di.codeOrchestre","o");
        $query->where("o.codeOrchestre = :orchestre");
        $query->setParameter("orchestre",$orchestres);

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findByGenre(GenreEntity $genre) {
        $query = $this->createQueryBuilder('a');
        $query->where("a.codeGenre = :genre");
        $query->setParameter("genre",$genre);

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }

    public function findByInstrument( InstrumentEntity $instrument ) {
        $query = $this->createQueryBuilder('a');
        $query->join("a.disques","d");
        $query->join("d.compositiondisques","cd");
        $query->join("cd.codeMorceau","enr");
        $query->join("enr.interpreters","int");
        $query->join("int.codeInstrument","inst");
        $query->where("inst.codeInstrument = :instrument");
        $query->setParameter("instrument", $instrument);

        $pagerfanta = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        return $pagerfanta;
    }
}