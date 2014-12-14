<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-14-2014
 * Time: 14:27
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Controller;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AlbumController extends Controller{

    /**
     * @param Musicien $musicien
     * @Template()
     */
    public function musicienAction( Musicien $musicien ) {
        $em = $this->get("doctrine.orm.entity_manager");
        $query = $em->getRepository("ProjetWebClassiqueBundle:Album")->createQueryBuilder( "a" );
        $query->join( "a.codeGenre", "g" );
        $query->join( "g.musiciens", "m" );
        $query->where( "m.codeMusicien = :musicien" );
        $query->setParameter( "musicien", $musicien );
        $query->setMaxResults(10);
        $albums = $query->getQuery()->getResult();
        return [ 'liste' => $albums ];
    }
} 