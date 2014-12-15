<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-13-2014
 * Time: 19:38
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Controller;

use Pagerfanta\Exception\NotValidCurrentPageException;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CompositeurController extends Controller {

    /**
     * @return array
     * @Template()
     */
    public function indexAction($page = 1) {
        $contexte = "Tous";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findAllCompositeurAdapter();

        $pager->setMaxPerPage(15);

        try {
            $pager->setCurrentPage($page);
        } catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException();
        }

        return compact('pager','contexte');
    }


    public function initialAction($initial, $page = 1){
        $contexte = "avec initiale";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findCompositeurByInitialAdapter($initial);

        $pager->setMaxPerPage(15);

        try {
            $pager->setCurrentPage($page);
        } catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException();
        }

        return $this->render('ProjetWebClassiqueBundle:Compositeur:index.html.twig',array('pager'=>$pager, 'contexte'=>$contexte,'initial'=>$initial));
    }

    public function naissanceAction($annee, $page = 1) {
        $contexte = "par année de naissance";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findCompositeurByNaissanceAdapter($annee);

        $pager->setMaxPerPage(15);

        try {
            $pager->setCurrentPage($page);
        } catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException();
        }

        return $this->render('ProjetWebClassiqueBundle:Compositeur:index.html.twig',array('pager'=>$pager, 'contexte'=>$contexte,'naissance'=>$annee,'fin'=> $annee + 10));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template()
     */
    public function viewAction( Musicien $musicien ) {
        $image = $this->generateUrl('projet_web_classique_musicienimagepage', array('codeMusicien'=> $musicien->getCodeMusicien() ));
        return compact('musicien','image');
    }

} 