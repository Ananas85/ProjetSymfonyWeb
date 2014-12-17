<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-14-2014
 * Time: 14:25
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Controller;
use ProjetWeb\ClassiqueBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class GenreController extends Controller {

    /**
     * @param int $page
     * @Template()
     */
    public function indexAction($page = 1) {
        $contexte = "Tous";
        $pager = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Genre')->findAllAdapter();
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );
        return compact('pager','contexte');

    }

    /**
     * @Template("ProjetWebClassiqueBundle:Genre:index.html.twig")
     */
    public function initialAction($initial, $page = 1){
        $contexte = "avec initiale";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Genre")->findGenreByInitialAdapter($initial);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager','contexte','initial');
    }


    /**
     * @param
     * @return
     * @Template()
     */
    public function viewAction( Genre $genre ) {
        return compact('genre');
    }

} 