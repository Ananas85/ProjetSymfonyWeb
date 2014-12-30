<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Orchestres;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OrchestresController extends Controller
{

    /**
     * @Route("/orchestres/{page}", requirements={"page" ="\d+"}, defaults={"page"=1}, name="orchestresindex")
     * @return array
     * @Cache(smaxage=3600)
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
     * @Cache(smaxage=3600)
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
     * @Route("/orchestres/search", name="orchestressearch")
     * @Cache(smaxage=3600)
     * @Method( {"GET"})
     */
    public function searchAction(Request $request)
    {

        $pattern     = $request->query->get('query');
        $results     = $this->getDoctrine()
                            ->getRepository("ProjetWebClassiqueBundle:Orchestres")
                            ->findOrchestreByPattern(
                                $pattern
                            );
        $suggestions = array();
        /** @var Orchestres $result */
        foreach ($results as $result) {
            $suggestions[] = array( 'value' => $result->getNomOrchestre(), 'data' => $result->getCodeOrchestre() );
        }

        return new JsonResponse(array( "suggestions" => $suggestions ));
    }


    /**
     * @Route("/orchestre/{codeOrchestre}", requirements={"codeOrchestre"="\d+"}, name="orchestreview")
     * @param
     * @Cache(smaxage=3600)
     * @return
     * @Template()
     */
    public function viewAction(Orchestres $orchestre)
    {
        return compact('orchestre');
    }
}