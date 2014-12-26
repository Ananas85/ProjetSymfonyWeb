<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Orchestres;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OrchestresController extends Controller
{

    /**
     * @Route("/orchestres/{page}", requirements={"page" ="\d+"}, defaults={"page"=1}, name="orchestresindex")
     * @return array
     * @Template()
     */
    public function indexAction($page = 1)
    {
        $contexte = "Tous";
        $pager    = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Orchestres")->findAllAdapter();

        $pager->setMaxPerPage(10);
        $pager->setCurrentPage($page);

        return compact('pager', 'contexte');
    }

    /**
     * @Route("/orchestres/initial/{initial}/{page}", requirements={"initial" = "\S", "page" ="\d+"}, defaults={"initial"= "A", "page"=1}, name="orchestresinitial")
     * @Template("ProjetWebClassiqueBundle:Orchestres:index.html.twig")
     */
    public function initialAction($initial, $page = 1)
    {
        $contexte = "avec initiale";
        $pager    = $this->getDoctrine()
                         ->getRepository("ProjetWebClassiqueBundle:Orchestres")
                         ->findOrchestresByInitialAdapter($initial);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager', 'contexte', 'initial');
    }


    /**
     * @Route("/orchestre/{codeOrchestre}", requirements={"codeOrchestre"="\d+"}, name="orchestreview")
     * @param
     *
     * @return
     * @Template()
     */
    public function viewAction(Orchestres $orchestre)
    {
        return compact('orchestre');
    }
}