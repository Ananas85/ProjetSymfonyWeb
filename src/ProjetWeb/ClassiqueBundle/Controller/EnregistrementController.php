<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Disque;
use ProjetWeb\ClassiqueBundle\Entity\Enregistrement;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;

class EnregistrementController extends Controller
{

    /**
     * @param Disque $album
     * @Template()
     */
    public function disqueAction(Disque $disque)
    {
        $enregistrements = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Enregistrement")->findByDisque(
            $disque
        );

        return compact('enregistrements');
    }

    /**
     * @Route("/enregistrement/son/{codeMorceau}", requirements={ "codeMorceau"="\d+"}, name="enregistrementson")
     * @param Enregistrement $instrument
     * @return Response
     */
    public function soundAction(Enregistrement $enregistrement)
    {
        $fs = new Filesystem();

        $path = $this->get('service_container')->getParameter('enr_album_storage');
        if (!$fs->exists($path)){
            $fs->mkdir($path);
        }

        $file = "{$path}/Enregistrement-{$enregistrement->getCodeMorceau()}.mp3";

        $response = new Response();
        $response->headers->set('Content-type', 'audio/mpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');

        if ( !$fs->exists($file))
        {
            $extrait    = stream_get_contents($enregistrement->getExtrait());
            //$image    = pack("H*", $image);
            file_put_contents($file,$extrait);
            return $response->setContent($extrait);
        }

        return $response->setContent(file_get_contents($file));
    }
}