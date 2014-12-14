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

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CompositeurController extends Controller {

    /**
     * @return array
     * @Template()
     */
    public function indexAction() {
        $contexte = "Tous";
        return [ 'liste' => $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findAllCompositeur(), 'contexte'=>$contexte ];
    }

    public function initialAction($initial){
        $contexte = "avec initiale";
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT m FROM ProjetWebClassiqueBundle:Musicien m JOIN ProjetWebClassiqueBundle:Composer c WITH m.codeMusicien = c.codeMusicien WHERE m.nomMusicien LIKE :initial ')->setParameter('initial',$initial.'%');
        $compositeurs = $query->getResult();
        return $this->render('ProjetWebClassiqueBundle:Compositeur:index.html.twig',array('liste'=>$compositeurs, 'contexte'=>$contexte,'initial'=>$initial));
    }

    public function naissanceAction($annee) {
        $contexte = "par année de naissance";
        $anneeFin = $annee + 10;
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('SELECT m FROM ProjetWebClassiqueBundle:Musicien m JOIN ProjetWebClassiqueBundle:Composer c WITH m.codeMusicien = c.codeMusicien WHERE m.anneeNaissance > :naissance AND m.anneeNaissance <= :fin ORDER BY m.nomMusicien ASC' )->setParameter('naissance', $annee)->setParameter('fin',$anneeFin);

        $musicien = $query->getResult();
        return $this->render('ProjetWebClassiqueBundle:Compositeur:index.html.twig',array('liste'=>$musicien, 'contexte'=>$contexte,'naissance'=>$annee,'fin'=>$anneeFin));
    }

    public function viewAction($id) {
        $repoMusicien = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Musicien');
        $musicien = $repoMusicien->find($id);
        $imageUrl = $this->generateUrl('projet_web_classique_musicienimagepage', array('id'=>$id));

        return $this->render('ProjetWebClassiqueBundle:Compositeur:view.html.twig',array('musicien'=>$musicien, 'image'=>$imageUrl));
    }

} 