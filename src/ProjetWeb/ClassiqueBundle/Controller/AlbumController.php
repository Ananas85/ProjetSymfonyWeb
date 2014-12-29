<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Album;
use ProjetWeb\ClassiqueBundle\Entity\Genre;
use ProjetWeb\ClassiqueBundle\Entity\Instrument;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use ProjetWeb\ClassiqueBundle\Entity\Orchestres;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

class AlbumController extends Controller
{

    /**
     * @param Album $album
     * @Route("/album/image/{codeAlbum}", requirements={"codeAlbum"="\d+"}, name="albumimage")
     * @Cache(smaxage=3600)
     * @return Response
     */
    public function imageAction(Album $album)
    {
        $fs = new Filesystem();

        $path = $this->get('service_container')->getParameter('img_album_storage');
        if (!$fs->exists($path)) {
            $fs->mkdir($path);
        }

        $file = "{$path}/Album-{$album->getCodeAlbum()}.jpeg";

        $response = new Response();
        $response->headers->set('Content-type', 'image/jpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');

        if (!$fs->exists($file)) {
            $image    = stream_get_contents($album->getPochette());
            file_put_contents($file, $image);
            return $response->setContent($image);
        }

        return $response->setContent(file_get_contents($file));

    }

    /**
     * @Route("/album/{codeAlbum}", requirements={"codeAlbum"="\d+"}, name="albumview")
     * @Cache(smaxage=3600)
     * @Template()
     */
    public function viewAction(Album $album)
    {
        $image = $this->generateUrl('albumimage', array( 'codeAlbum' => $album->getCodeAlbum() ));

        return compact('album', 'image');
    }


    /**
     * @param Musicien $musicien
     * @Cache(smaxage=3600)
     * @Route("/albums/compositeur/{codeMusicien}/page/{page}", requirements={"codeMusicien"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumCompositeur")
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function compositeurAction(Musicien $musicien, $page = 1)
    {
        $pager       = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByCompositeur(
            $musicien
        );
        $albumsPaged = $pager->setMaxPerPage(10)->setCurrentPage($page)->getCurrentPageResults();

        return compact('pager', 'albumsPaged', 'musicien');
    }

    /**
     * @param Musicien $musicien
     * @Cache(smaxage=3600)
     * @Route("/albums/interprete/{codeMusicien}/page/{page}", requirements={"codeMusicien"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumInterprete")
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function interpreteAction(Musicien $musicien, $page = 1)
    {
        $pager       = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByInterprete(
            $musicien
        );
        $albumsPaged = $pager->setMaxPerPage(10)->setCurrentPage($page)->getCurrentPageResults();

        return compact('pager', 'albumsPaged', 'musicien');
    }

    /**
     * @param Musicien $musicien
     * @Cache(smaxage=3600)
     * @Route("/albums/chef/{codeMusicien}/page/{page}", requirements={"codeMusicien"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumChef")
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function chefAction(Musicien $musicien, $page = 1)
    {
        $pager       = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByChef($musicien);
        $albumsPaged = $pager->setMaxPerPage(10)->setCurrentPage($page)->getCurrentPageResults();

        return compact('pager', 'albumsPaged', 'musicien');
    }

    /**
     * @param Musicien $musicien
     * @Cache(smaxage=3600)
     * @Route("/albums/orchestre/{codeOrchestre}/page/{page}", requirements={"codeOrchestre"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumOrchestre")
     * @Template("ProjetWebClassiqueBundle:Album:orchestre.html.twig")
     */
    public function orchestreAction(Orchestres $orchestre, $page = 1)
    {
        $pager       = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByOrchestre(
            $orchestre
        );
        $albumsPaged = $pager->setMaxPerPage(10)->setCurrentPage($page)->getCurrentPageResults();

        return compact('pager', 'albumsPaged', 'orchestre');
    }

    /**
     * @Route("/albums/genre/{codeGenre}/page/{page}", requirements={"codeGenre"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumGenre")
     * @param Genre $genre
     * @Cache(smaxage=3600)
     * @Template("ProjetWebClassiqueBundle:Album:genre.html.twig")
     */
    public function genreAction(Genre $genre, $page = 1)
    {
        $pager       = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByGenre($genre);
        $albumsPaged = $pager->setMaxPerPage(10)->setCurrentPage($page)->getCurrentPageResults();

        return compact('pager', 'albumsPaged', 'genre');
    }

    /**
     * @param Instrument instrument
     * @Cache(smaxage=3600)
     * @Route("/albums/instrument/{codeInstrument}/page/{page}", requirements={"codeGenre"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumGenre")
     * @Template("ProjetWebClassiqueBundle:Album:instrument.html.twig")
     */
    public function instrumentAction(Instrument $instrument, $page = 1)
    {
        $pager       = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByInstrument(
            $instrument
        );
        $albumsPaged = $pager->setMaxPerPage(10)->setCurrentPage($page)->getCurrentPageResults();

        return compact('pager', 'albumsPaged', 'instrument');
    }
}