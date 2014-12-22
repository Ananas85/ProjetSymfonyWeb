<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-19-2014
 * Time: 18:39
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Controller;
use ProjetWeb\ClassiqueBundle\Entity\Disque;
use ProjetWeb\ClassiqueBundle\Entity\Enregistrement;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EnregistrementController extends Controller {

    /**
     * @param Album $album
     * @Template()
     */
    public function disqueAction( Disque $disque, $page = 1 ) {
        $enregistrements = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Enregistrement")->findByDisque($disque);
        return compact('enregistrements');
    }

    /**
     * @Route("/enregistrement/son/{codeMorceau}", requirements={ "codeMorceau"="\d+"}, name="enregistrementson")
     * @param Instrument $instrument
     * @return Response
     */
    public function soundAction( Enregistrement $enregistrement ) {
        $extrait = stream_get_contents($enregistrement->getExtrait());
        $extrait = pack("H*", $extrait);
        $response = new Response();
        $response->headers->set('Content-type', 'audio/mpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->setContent($extrait);
        return $response;
    }

} 