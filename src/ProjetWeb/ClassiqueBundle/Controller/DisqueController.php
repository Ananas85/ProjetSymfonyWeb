<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-19-2014
 * Time: 18:38
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Controller;
use ProjetWeb\ClassiqueBundle\Entity\Album;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DisqueController extends Controller{

    /**
     * @param Album $album
     * @Template()
     */
    public function albumAction( Album $album, $page = 1 ) {
        $disques = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Disque")->findByAlbum($album);
        return compact('disques');
    }

} 