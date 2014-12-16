<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-13-2014
 * Time: 19:39
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Controller;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class InterpreteController extends Controller{

    /**
     * @param int $page
     * @return array
     */
    public function indexAction($page = 1) {
        $contexte = "Tous";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findAllInterpreteAdapter();

        /** @var Pagerfanta $pager */
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );

        return compact('pager','contexte');
    }

    /**
     * @Template("ProjetWebClassiqueBundle:Interprete:index")
     */
    public function initialAction($initial, $page = 1){
        $contexte = "avec initiale";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findInterpreteByInitialAdapter($initial);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager','contexte','initial');
    }

    /**
     * @Template("ProjetWebClassiqueBundle:Interprete:index")
     */
    public function naissanceAction($naissance, $page = 1) {
        $contexte = "par année de naissance";
        $fin = $naissance + 10;
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findInterpreteByNaissanceAdapter($naissance);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager','contexte','naissance','fin');
    }

    /**
     * @param
     * @return
     * @Template()
     */
    public function viewAction( Musicien $musicien ) {
        $image = $this->generateUrl('projet_web_classique_musicienimagepage', array('codeMusicien'=> $musicien->getCodeMusicien() ));
        return compact('musicien','image');
    }
} 