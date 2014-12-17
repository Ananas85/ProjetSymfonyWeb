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
use ProjetWeb\ClassiqueBundle\Entity\Album;
use ProjetWeb\ClassiqueBundle\Entity\Genre;
use ProjetWeb\ClassiqueBundle\Entity\Instrument;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use ProjetWeb\ClassiqueBundle\Entity\Orchestres;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class AlbumController extends Controller{

    /**
     * @Template()
     */
    public function viewAction( Album $album ) {
        return compact('album');
    }

    /**
     * @param Musicien $musicien
     * @Template()
     */
    public function musicienAction( Musicien $musicien, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByCompositeur($musicien);
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );
        return compact('pager');
    }

    /**
     * @param Musicien $musicien
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function compositeurAction( Musicien $musicien, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByCompositeur($musicien);
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );
        return compact('pager');
    }

    /**
     * @param Musicien $musicien
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function interpreteAction( Musicien $musicien, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByInterprete($musicien);
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );
        return compact('pager');
    }

    /**
     * @param Musicien $musicien
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function chefAction( Musicien $musicien, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByChef($musicien);
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );
        return compact('pager');
    }

    /**
     * @param Musicien $musicien
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function orchestreAction( Orchestres $orchestre, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByOrchestre($orchestre);
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );
        return compact('pager');
    }

    /**
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function genreAction( Genre $genre , $page = 1) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByGenre($genre);
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );
        return compact('pager');
    }

    /**
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function instrumentAction( Instrument $instrument, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByInstrument($instrument);
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );
        return compact('pager');
    }
}
