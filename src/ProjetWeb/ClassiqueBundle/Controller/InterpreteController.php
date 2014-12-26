<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use ProjetWeb\ClassiqueBundle\Entity\Instrument;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InterpreteController extends Controller
{

    /**
     * @param int $page
     *
     * @return array
     * @Route("/interpretes/{page}", requirements={"page" ="\d+"}, defaults={"page"=1}, name="interpretesindex")
     * @Template()
     */
    public function indexAction($page = 1)
    {
        $contexte = "Tous";
        $pager    = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findAllInterpreteAdapter(
        );

        /** @var Pagerfanta $pager */
        $pager->setMaxPerPage(10);
        $pager->setCurrentPage($page);

        return compact('pager', 'contexte');
    }

    /**
     * @Route("/interpretes/initial/{initial}/{page}", requirements={"initial" = "\S", "page" ="\d+"}, defaults={"initial"= "A", "page"=1}, name="interpretesinitial")
     * @Template("ProjetWebClassiqueBundle:Interprete:index.html.twig")
     */
    public function initialAction($initial, $page = 1)
    {
        $contexte = "avec initiale";
        $pager    = $this->getDoctrine()
                         ->getRepository("ProjetWebClassiqueBundle:Musicien")
                         ->findInterpreteByInitialAdapter($initial);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager', 'contexte', 'initial');
    }

    /**
     * @Route("/interpretes/naissance/{naissance}/{page}", requirements={"naissance" = "\d+", "page" ="\d+"}, defaults={"naissance"= 1900, "page"=1}, name="interpretesnaissance")
     * @Template("ProjetWebClassiqueBundle:Interprete:index.html.twig")
     */
    public function naissanceAction($naissance, $page = 1)
    {
        $contexte = "par année de naissance";
        $fin      = $naissance + 10;
        $pager    = $this->getDoctrine()
                         ->getRepository("ProjetWebClassiqueBundle:Musicien")
                         ->findInterpreteByNaissanceAdapter($naissance);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager', 'contexte', 'naissance', 'fin');
    }

    /**
     * @param
     *
     * @return
     * @Route("/interprete/{codeMusicien}", requirements={"codeMusicien"="\d+"}, name="interpreteview")
     * @Template()
     */
    public function viewAction(Musicien $musicien)
    {
        $image = $this->generateUrl('musicienimage', array( 'codeMusicien' => $musicien->getCodeMusicien() ));

        return compact('musicien', 'image');
    }

    /**
     * @param Instrument $instrument
     * @Route("/interpretes/instrument/{codeInstrument}/{page}", requirements={ "codeInstrument" = "\d+","page"="\d+" }, defaults={"page"=1}, name="interpretesinstrument")
     * @Template()
     */
    public function instrumentAction(Instrument $instrument, $page = 1)
    {
        $pager = $this->getDoctrine()
                      ->getRepository("ProjetWebClassiqueBundle:Musicien")
                      ->findInterpreteByInstrumentAdapter($instrument);
        $pager->setMaxPerPage(10);
        $pager->setCurrentPage($page);

        return compact('pager');
    }
}