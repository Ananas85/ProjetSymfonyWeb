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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class GenreController extends Controller {

    /**
     * @param int $page
     * @Route("/genres/{page}", requirements={"page" ="\d+"}, defaults={"page"=1}, name="genresindex")
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
     * @Route("/genres/initial/{initial}/{page}", requirements={"initial" = "\S", "page" ="\d+"}, defaults={"initial"= "A", "page"=1}, name="genresinitial")
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
     * @Route("/genre/{codeGenre}", requirements={"codeGenre"="\d+"}, name="genreview")
     * @Template()
     */
    public function viewAction( Genre $genre ) {
        return compact('genre');
    }

} 