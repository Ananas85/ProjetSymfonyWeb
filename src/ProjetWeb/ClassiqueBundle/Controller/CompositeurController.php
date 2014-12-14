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
    public function indexAction() {
        $contexte = "Tous";
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder()
                    ->select('distinct(codeMusicien)')
                    ->from('ProjetWebClassiqueBundle:Composer','c')
                    ->getQuery();

        $compositeurs = $query->getResult();


        return $this->render('ProjetWebClassiqueBundle:Compositeur:index.html.twig',array('liste'=>$compositeurs, 'contexte'=>$contexte));
    }

    public function initialAction($initial){
        $contexte = "avec initiale";
        $repoComposer = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Composer');
        $query = $repoComposer->createQueryBuilder('c')
                                 ->join('c.codeMusicien','m')
                                 ->addSelect('m')
                                 ->where('m.nomMusicien LIKE :init')
                                 ->setParameter('init', $initial.'%')
                                 ->orderBy('m.nomMusicien', 'ASC')
                                 ->getQuery();
        $resultat = $query->getResult();
        $compositeurs = array();
        //Methode lente du dictinct mais pour l'instant rien trouvé d'autre
        foreach($resultat as $compo) {
            if (!in_array($compo->getCodeMusicien(),$compositeurs))
                $compositeurs[] = $compo->getCodeMusicien();
        }
        return $this->render('ProjetWebClassiqueBundle:Compositeur:index.html.twig',array('liste'=>$compositeurs, 'contexte'=>$contexte,'initial'=>$initial));
    }

    public function naissanceAction($annee) {
        $contexte = "par année de naissance";
        $anneeFin = $annee + 10;
        $em = $this->getDoctrine()
                   ->getManager();
        // Utilisation de DQL
        $query = $em->createQuery('SELECT m FROM ProjetWeb\ClassiqueBundle\Entity\Musicien m WHERE m.annéeNaissance > :naissance ORDER BY m.nomMusicien ASC' )->setParameter('naissance', $annee);
        $repoMusicien = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Musicien');
        /*$query = $repoMusicien->createQueryBuilder('m')
                              ->where(''.utf8_decode(m.annéeNaissance).' > :naissance')
                              ->setParameter('init', $annee)
                              ->getQuery()*/;
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