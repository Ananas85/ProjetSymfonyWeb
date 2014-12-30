<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Genre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GenreController extends Controller
{

    /**
     * @param int $page
     * @Route("/genres/{page}", requirements={"page" ="\d+"}, defaults={"page"=1}, name="genresindex")
     * @Cache(smaxage=3600)
     * @Template()
     */
    public function indexAction($page = 1)
    {
        $contexte = "Tous";
        $pager    = $this->getDoctrine()->getRepository('ProjetWebClassiqueBundle:Genre')->findAllAdapter();
        $pager->setMaxPerPage(10);
        $pager->setCurrentPage($page);

        return compact('pager', 'contexte');

    }

    /**
     * @Route("/genres/initial/{initial}/{page}", requirements={"initial" = "\S", "page" ="\d+"}, defaults={"initial"= "A", "page"=1}, name="genresinitial")
     * @Template("ProjetWebClassiqueBundle:Genre:index.html.twig")
     * @Cache(smaxage=3600)
     */
    public function initialAction($initial, $page = 1)
    {
        $contexte = "avec initiale";
        $pager    = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Genre")->findGenreByInitialAdapter(
            $initial
        );

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page);

        return compact('pager', 'contexte', 'initial');
    }

    /**
     * @Route("/genres/search", name="genressearch")
     * @Cache(smaxage=3600)
     * @Method( {"GET"})
     */
    public function searchAction(Request $request)
    {

        $pattern     = $request->query->get('query');
        $results     = $this->getDoctrine()
                            ->getRepository("ProjetWebClassiqueBundle:Genre")
                            ->findGenreByPattern(
                                $pattern
                            );
        $suggestions = array();
        /** @var Genre $result */
        foreach ($results as $result) {
            $suggestions[] = array( 'value' => $result->getLibelleAbrege(), 'data' => $result->getCodeGenre() );
        }

        return new JsonResponse(array( "suggestions" => $suggestions ));
    }


    /**
     * @param
     * @Cache(smaxage=3600)
     * @return
     * @Route("/genre/{codeGenre}", requirements={"codeGenre"="\d+"}, name="genreview")
     * @Template()
     */
    public function viewAction(Genre $genre)
    {
        return compact('genre');
    }
}