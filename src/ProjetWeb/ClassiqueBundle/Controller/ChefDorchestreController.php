<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-14-2014
 * Time: 14:23
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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ChefDorchestreController extends Controller{
    /**
     * @return array
     * @Route("/cheforchestres/{page}", requirements={"page" = "\d+"}, defaults={"page" = 1}, name="chefindex")
     * @Template()
     */
    public function indexAction($page = 1) {
        $contexte = "Tous";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findAllChefAdapter();

        /** @var Pagerfanta $pager */
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );

        return compact('pager','contexte');
    }

    /**
     * @Route("/cheforchestres/initial/{initial}/{page}", requirements={"initial" = "\S", "page" ="\d+"}, defaults={"initial"= "A", "page"=1}, name="chefsinitial")
     * @Template("ProjetWebClassiqueBundle:ChefDorchestre:index.html.twig")
     */
    public function initialAction($initial, $page = 1){
        $contexte = "avec initiale";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findChefByInitialAdapter($initial);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager','contexte','initial');
    }

    /**
     * @Route("/cheforchestres/naissance/{naissance}/{page}", requirements={"naissance" = "\d+", "page" ="\d+"}, defaults={"naissance"= 1900, "page"=1}, name="chefsnaissance")
     * @Template("ProjetWebClassiqueBundle:ChefDorchestre:index.html.twig")
     */
    public function naissanceAction($naissance, $page = 1) {
        $contexte = "par année de naissance";
        $fin = $naissance + 10;
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findChefByNaissanceAdapter($naissance);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager','contexte','naissance','fin');
    }

    /**
     * @param
     * @return
     * @Route("/cheforchestre/{codeMusicien}", requirements={"codeMusicien"="\d+"}, name="chefview")
     * @Template()
     */
    public function viewAction( Musicien $musicien ) {
        $image = $this->generateUrl('musicienimage', array('codeMusicien'=> $musicien->getCodeMusicien() ));
        return compact('musicien','image');
    }
} 