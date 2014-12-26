<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Album;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DisqueController extends Controller
{
    /**
     * @param Album $album
     * @Template()
     */
    public function albumAction(Album $album)
    {
        $disques = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Disque")->findByAlbum($album);

        return compact('disques');
    }
}