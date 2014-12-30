<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CompositeurController extends Controller
{
    /**
     * @return array
     * @Route("/compositeurs/{page}", requirements={"page" ="\d+"}, defaults={"page"=1}, name="compositeursindex")
     * @Cache(smaxage=3600)
     * @Template()
     */
    public function indexAction($page = 1)
    {
        $contexte = "Tous";
        $pager    = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Musicien")->findAllCompositeurAdapter(
        );


        /** @var Pagerfanta $pager */
        $pager->setMaxPerPage(10);
        $pager->setCurrentPage($page);

        return compact('pager', 'contexte');
    }

    /**
     * @Route("/compositeurs/initial/{initial}/{page}", requirements={"initial" = "\S", "page" ="\d+"}, defaults={"initial"= "A", "page"=1}, name="compositeursinitial")
     * @Template("ProjetWebClassiqueBundle:Compositeur:index.html.twig")
     * @Cache(smaxage=3600)
     */
    public function initialAction($initial, $page = 1)
    {
        $contexte = "avec initiale";
        $pager    = $this->getDoctrine()
                         ->getRepository("ProjetWebClassiqueBundle:Musicien")
                         ->findCompositeurByInitialAdapter($initial);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);


        return compact('pager', 'contexte', 'initial');
    }


    /**
     * @Route("/compositeurs/search", name="compositeurssearch")
     * @Method( {"GET"})
     */
    public function searchAction(Request $request)
    {

        $pattern     = $request->query->get('query');
        $results     = $this->getDoctrine()
                            ->getRepository("ProjetWebClassiqueBundle:Musicien")
                            ->findCompositeurByPattern(
                                $pattern
                            );
        $suggestions = array();
        /** @var Musicien $result */
        foreach ($results as $result) {
            $suggestions[] = array( 'value' => $result->getNomMusicien().' '.$result->getPrenomMusicien(), 'data' => $result->getCodeMusicien() );
        }

        return new JsonResponse(array( "suggestions" => $suggestions ));
    }

    /**
     * @Route("/compositeurs/naissance/{naissance}/{page}", requirements={"naissance" = "\d+", "page" ="\d+"}, defaults={"naissance"= 1900, "page"=1}, name="compositeursnaissance")
     * @Template("ProjetWebClassiqueBundle:Compositeur:index.html.twig")
     * @Cache(smaxage=3600)
     */
    public function naissanceAction(Request $request, $naissance, $page = 1)
    {
        $defaultData = array( 'naissance' => '' );


        $formulaire = $this->createFormBuilder($defaultData)
                           ->add('naissance', 'text', array( 'label' => 'Naissance : ' ))
                           ->add('go', 'submit')
                           ->getForm();

        $formulaire->handleRequest($request);

        if ($formulaire->isValid()) {
            // Les données sont un tableau avec les clés "name";
            $data = $formulaire->getData();
            $year = $data['naissance'];

            if (!is_numeric($year) || strlen($year) > 4) {
                $this->get('session')->getFlashBag()->add('warning', "La date de naissance du Compositeur que vous avez indiquée n'est pas valide
                , elle doit être numérique et ne pas dépasser les 4 chiffres");
                return $this->redirect($this->generateUrl('compositeursnaissance', array( 'naissance' => 1900 )));
            }

            return $this->redirect($this->generateUrl('compositeursnaissance', array( 'naissance' => $year )));
        }

        $contexte = "par année de naissance";
        $fin      = $naissance + 10;
        $pager    = $this->getDoctrine()
                         ->getRepository("ProjetWebClassiqueBundle:Musicien")
                         ->findCompositeurByNaissanceAdapter($naissance);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        $form = $formulaire->createView();
        return compact('pager', 'contexte', 'naissance', 'fin', 'form');
    }

    /**
     * @Route("/compositeur/{codeMusicien}", requirements={"codeMusicien"="\d+"}, name="compositeurview")
     * @Cache(smaxage=3600)
     * @Template()
     */
    public function viewAction(Musicien $musicien)
    {
        $image = $this->generateUrl('musicienimage', array( 'codeMusicien' => $musicien->getCodeMusicien() ));
        $formattedResponse = $this->get('projetwebclassique.amazon_music_search')->search($musicien);
        var_dump($formattedResponse);

        return compact('musicien', 'image');
    }
}