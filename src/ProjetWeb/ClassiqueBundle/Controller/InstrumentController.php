<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Instrument;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InstrumentController extends Controller
{

    /**
     * @return array
     * @Route("/instruments/{page}", requirements={"page" ="\d+"}, defaults={"page"=1}, name="instrumentsindex")
     * @Template()
     */
    public function indexAction($page = 1)
    {
        $contexte = "Tous";
        $pager    = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Instrument")->findAllAdapter();

        $pager->setMaxPerPage(10);
        $pager->setCurrentPage($page);

        return compact('pager', 'contexte');
    }

    /**
     * @Route("/instruments/initial/{initial}/{page}", requirements={"initial" = "\S", "page" ="\d+"}, defaults={"initial"= "A", "page"=1}, name="instrumentsinitial")
     * @Template("ProjetWebClassiqueBundle:Instrument:index.html.twig")
     */
    public function initialAction($initial, $page = 1)
    {
        $contexte = "avec initiale";
        $pager    = $this->getDoctrine()
                         ->getRepository("ProjetWebClassiqueBundle:Instrument")
                         ->findInstrumentByInitialAdapter($initial);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager', 'contexte', 'initial');
    }

    /**
     * @param
     * @Route("/instrument/{codeInstrument}", requirements={"codeInstrument"="\d+"}, name="instrumentview")
     * @Template()
     */
    public function viewAction(Instrument $instrument)
    {
        $image = $this->generateUrl('instrumentimage', array( 'codeInstrument' => $instrument->getCodeInstrument() ));

        return compact('instrument', 'image');
    }

    /**
     * @Route("/instrument/image/{codeInstrument}", requirements={ "codeMusicien"="\d+"}, name="instrumentimage")
     * @param Instrument $instrument
     *
     * @return Response
     */
    public function imageAction(Instrument $instrument)
    {
        $fs = new Filesystem();

        $path = $this->get('service_container')->getParameter('img_instrument_storage');
        if (!$fs->exists($path)){
            $fs->mkdir($path);
        }

        $file = "{$path}/Instrument-{$instrument->getCodeInstrument()}.jpeg";

        $response = new Response();
        $response->headers->set('Content-type', 'image/jpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');

        if ( !$fs->exists($file))
        {
            $image    = stream_get_contents($instrument->getImage());
            //$image    = pack("H*", $image);
            file_put_contents($file,$image);
            return $response->setContent($image);
        }

        return $response->setContent(file_get_contents($file));

    }
}