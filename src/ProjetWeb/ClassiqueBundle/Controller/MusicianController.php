<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-10-2014
 * Time: 14:52
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MusicianController extends Controller{

    public function indexAction() {
        $repoMusicien = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Musicien');
        $musicien = $repoMusicien->findAll();
        return $this->render('ProjetWebClassiqueBundle:Musicien:index.html.twig',array('liste'=>$musicien));
    }

    public function initialAction($initial){
        $repoMusicien = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Musicien');
        $query = $repoMusicien->createQueryBuilder('m')
                            ->where('m.nomMusicien LIKE :init')
                            ->setParameter('init', $initial.'%')
                            ->orderBy('m.nomMusicien', 'ASC')
                            ->getQuery();
        $musicien = $query->getResult();
        return $this->render('ProjetWebClassiqueBundle:Musicien:index.html.twig',array('liste'=>$musicien));
    }

    public function viewAction($id) {
        $repoMusicien = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Musicien');
        $musicien = $repoMusicien->myFindOne($id);
        $imageUrl = $this->generateUrl('projet_web_classique_musicienimagepage', array('id'=>$id));

        return $this->render('ProjetWebClassiqueBundle:Musicien:view.html.twig',array('musicien'=>$musicien, 'image'=>$imageUrl));
    }

    public function imageAction($id) {
        $repoMusicien = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Musicien');
        $musicien = $repoMusicien->find($id);
        $image = stream_get_contents($musicien->getPhoto());
        $image = pack("H*", $image);
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->headers->set('Content-type', 'image/jpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->setContent($image);
        return $response;
    }
} 