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
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ChefDorchestreController extends Controller{
    public function indexAction() {
        $contexte = "Tous";
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT m FROM ProjetWebClassiqueBundle:Musicien m JOIN ProjetWebClassiqueBundle:Direction d WITH m.codeMusicien = d.codeMusicien' );
        $chefs = $query->getResult();

        return $this->render('ProjetWebClassiqueBundle:ChefDorchestre:index.html.twig',array('liste'=>$chefs, 'contexte'=>$contexte));
    }

    public function initialAction($initial){
        $contexte = "avec initiale";
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT m FROM ProjetWebClassiqueBundle:Musicien m JOIN ProjetWebClassiqueBundle:Direction d WITH m.codeMusicien = d.codeMusicien WHERE m.nomMusicien LIKE :initial ')->setParameter('initial',$initial.'%');
        $chefs = $query->getResult();
        return $this->render('ProjetWebClassiqueBundle:ChefDorchestre:index.html.twig',array('liste'=>$chefs, 'contexte'=>$contexte,'initial'=>$initial));
    }

    public function naissanceAction($annee) {
        $contexte = "par année de naissance";
        $anneeFin = $annee + 10;
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT m FROM ProjetWebClassiqueBundle:Musicien m JOIN ProjetWebClassiqueBundle:Direction d WITH m.codeMusicien = d.codeMusicien WHERE m.anneeNaissance > :naissance AND m.anneeNaissance <= :fin ORDER BY m.nomMusicien ASC' )->setParameter('naissance', $annee)->setParameter('fin',$anneeFin);

        $chefs = $query->getResult();
        return $this->render('ProjetWebClassiqueBundle:ChefDorchestre:index.html.twig',array('liste'=>$chefs, 'contexte'=>$contexte,'naissance'=>$annee,'fin'=>$anneeFin));
    }

    public function viewAction($id) {
        $repoMusicien = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Musicien');
        $musicien = $repoMusicien->find($id);
        $imageUrl = $this->generateUrl('projet_web_classique_musicienimagepage', array('id'=>$id));

        return $this->render('ProjetWebClassiqueBundle:ChefDorchestre:index.html.twig',array('musicien'=>$musicien, 'image'=>$imageUrl));
    }
} 