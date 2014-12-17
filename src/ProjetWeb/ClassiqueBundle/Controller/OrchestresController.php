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
use ProjetWeb\ClassiqueBundle\Entity\Orchestres;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class OrchestresController extends Controller {

    /**
     * @return array
     * @Template()
     */
    public function indexAction($page = 1) {
        $contexte = "Tous";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Orchestres")->findAllAdapter();

        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );

        return compact('pager','contexte');
    }

    /**
     * @Template("ProjetWebClassiqueBundle:Orchestres:index.html.twig")
     */
    public function initialAction($initial, $page = 1){
        $contexte = "avec initiale";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Orchestres")->findOrchestresByInitialAdapter($initial);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager','contexte','initial');
    }


    /**
     * @param
     * @return
     * @Template()
     */
    public function viewAction( Orchestres $orchestre ) {
        return compact('orchestre');
    }


}