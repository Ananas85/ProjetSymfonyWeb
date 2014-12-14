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
        $repoDirection = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Direction');
        $query = $repoDirection->createQueryBuilder('d')
                                 ->join('d.codeMusicien','m')
                                 ->addSelect('m')
                                 ->orderBy('m.nomMusicien','ASC')
                                 ->getQuery();
        $resultat = $query->getResult();
        $interpretes = array();
        //Methode lente du dictinct mais pour l'instant rien trouvé d'autre
        foreach($resultat as $compo) {
            $interpretes[] = $compo->getCodeMusicien();
        }
        $interpretes = array_unique($interpretes,SORT_REGULAR);

        return $this->render('ProjetWebClassiqueBundle:Interprete:index.html.twig',array('liste'=>$interpretes, 'contexte'=>$contexte));
    }

    public function initialAction($initial){
        $contexte = "avec initiale";
        $repoInterpreter = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Interpreter');
        $query = $repoInterpreter->createQueryBuilder('i')
                                 ->join('i.codeMusicien','m')
                                 ->addSelect('m')
                                 ->where('m.nomMusicien LIKE :init')
                                 ->setParameter('init', $initial.'%')
                                 ->orderBy('m.nomMusicien', 'ASC')
                                 ->getQuery();
        $resultat = $query->getResult();
        $interpretes = array();
        //Methode lente du dictinct mais pour l'instant rien trouvé d'autre
        foreach($resultat as $compo) {
            if (!in_array($compo->getCodeMusicien(),$interpretes))
                $interpretes[] = $compo->getCodeMusicien();
        }
        return $this->render('ProjetWebClassiqueBundle:Interprete:index.html.twig',array('liste'=>$interpretes, 'contexte'=>$contexte,'initial'=>$initial));
    }
} 