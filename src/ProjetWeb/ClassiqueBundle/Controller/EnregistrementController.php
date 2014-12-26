<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Disque;
use ProjetWeb\ClassiqueBundle\Entity\Enregistrement;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
     *
     * @return Response
     */
    public function soundAction(Enregistrement $enregistrement)
    {
        $extrait  = stream_get_contents($enregistrement->getExtrait());
        $extrait  = pack("H*", $extrait);
        $response = new Response();
        $response->headers->set('Content-type', 'audio/mpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->setContent($extrait);

        return $response;
    }
}