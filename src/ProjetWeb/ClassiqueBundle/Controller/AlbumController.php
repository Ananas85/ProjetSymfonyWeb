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
    public function musicienAction( Musicien $musicien, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByMusicienAdapter( $musicien );
        $pager->setCurrentPage( $page );
        $pager->setMaxPerPage( 10 );

        return [ 'pager' => $pager ];
    }
} 