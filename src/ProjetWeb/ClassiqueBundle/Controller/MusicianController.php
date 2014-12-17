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
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class MusicianController extends Controller{

    /**
     * @param Musicien $musicien
     * @Route("/musicien/image/{codeMusicien}", requirements={"codeMusicien"="\d+"}, name="musicienimage")
     * @return Response
     */
    public function imageAction( Musicien $musicien ) {
        $image = stream_get_contents($musicien->getPhoto());
        $image = pack("H*", $image);
        $response = new Response();
        $response->headers->set('Content-type', 'image/jpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->setContent($image);
        return $response;
    }
} 