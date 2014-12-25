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
use Pagerfanta\Pagerfanta;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CompositeurController extends Controller {

    /**
     * @return array
     * @Route("/compositeurs/{page}", requirements={"page" ="\d+"}, defaults={"page"=1}, name="compositeursindex")
     * @Template()
     */
    public function indexAction($page = 1) {
        $contexte = "Tous";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findAllCompositeurAdapter();


        /** @var Pagerfanta $pager */
        $pager->setMaxPerPage( 10 );
        $pager->setCurrentPage( $page );

        return compact('pager','contexte');
    }

    /**
     * @Route("/compositeurs/initial/{initial}/{page}", requirements={"initial" = "\S", "page" ="\d+"}, defaults={"initial"= "A", "page"=1}, name="compositeursinitial")
     * @Template("ProjetWebClassiqueBundle:Compositeur:index.html.twig")
     */
    public function initialAction($initial, $page = 1, Request  $request){

        $defaultData = array('initial'=>'Tapez le début de votre compositeur');


        $formulaire = $this->createFormBuilder($defaultData)
                     ->add('initial', 'text',array('label' => 'Initial : '))
                     ->add('go','submit')
                     ->getForm();

        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            // Les données sont un tableau avec les clés "name";
            $data = $formulaire->getData();
            $init = $data['initial'];
            return $this->redirect($this->generateUrl('compositeursinitial', array( 'initial' => $init ) ) );
        }

        $contexte = "avec initiale";
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findCompositeurByInitialAdapter($initial);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        $form = $formulaire->createView();

        return compact('pager','contexte','initial','form');
    }


    /**
     * @Route("/compositeurs/search", name="compositeurssearch")
     * @Method( {"GET"})
     */
    public function searchAction(Request $request){

        $pattern = $request->query->get('query' );
        $results = $this->getDoctrine()->getRepository( "ProjetWebClassiqueBundle:Musicien" )->findCompositeurByPattern( $pattern );
        $suggestions = array();
        foreach( $results as $result ) {
            $suggestions[] = array( 'value' => $result->getNomMusicien(), 'data' => $result->getCodeMusicien() );
        }
        return new JsonResponse( array( "suggestions" => $suggestions ) );
    }
    /**
     * @Route("/compositeurs/naissance/{naissance}/{page}", requirements={"naissance" = "\d+", "page" ="\d+"}, defaults={"naissance"= 1900, "page"=1}, name="compositeursnaissance")
     * @Template("ProjetWebClassiqueBundle:Compositeur:index.html.twig")
     */
    public function naissanceAction($naissance, $page = 1) {
        $contexte = "par année de naissance";
        $fin = $naissance + 10;
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findCompositeurByNaissanceAdapter($naissance);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager','contexte','naissance','fin');
    }

    /**
     * @param
     * @return
     * @Route("/compositeur/{codeMusicien}", requirements={"codeMusicien"="\d+"}, name="compositeurview")
     * @Template()
     */
    public function viewAction( Musicien $musicien) {
        $image = $this->generateUrl('musicienimage', array('codeMusicien'=> $musicien->getCodeMusicien() ));
        return compact('musicien','image');
    }

} 