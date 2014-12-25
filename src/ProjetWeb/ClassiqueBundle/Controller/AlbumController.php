<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-14-2014
 * Time: 14:27
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */


namespace ProjetWeb\ClassiqueBundle\Controller;
use ProjetWeb\ClassiqueBundle\Entity\Album;
use ProjetWeb\ClassiqueBundle\Entity\Genre;
use ProjetWeb\ClassiqueBundle\Entity\Instrument;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use ProjetWeb\ClassiqueBundle\Entity\Orchestres;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class AlbumController extends Controller{

    /**
     * @param Album $album
     * @Route("/album/image/{codeAlbum}", requirements={"codeAlbum"="\d+"}, name="albumimage")
     * @return Response
     */
    public function imageAction(Album $album ) {
        $image = stream_get_contents($album->getPochette());
        $image = pack("H*", $image);
        $response = new Response();
        $response->headers->set('Content-type', 'image/jpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->setContent($image);
        return $response;
    }

    /**
     * @Route("/album/{codeAlbum}", requirements={"codeAlbum"="\d+"}, name="albumview")
     * @Template()
     */
    public function viewAction( Album $album ) {
        $image = $this->generateUrl('albumimage', array('codeAlbum'=> $album->getCodeAlbum() ));
        return compact('album','image');
    }


    /**
     * @param Musicien $musicien
     * @Route("/albums/compositeur/{codeMusicien}/page/{page}", requirements={"codeMusicien"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumCompositeur")
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function compositeurAction( Musicien $musicien, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByCompositeur($musicien);
        $albumsPaged = $pager->setMaxPerPage( 10 )->setCurrentPage( $page )->getCurrentPageResults();
        return compact('pager','albumsPaged','musicien');
    }

    /**
     * @param Musicien $musicien
     * @Route("/albums/interprete/{codeMusicien}/page/{page}", requirements={"codeMusicien"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumInterprete")
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function interpreteAction( Musicien $musicien, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByInterprete($musicien);
        $albumsPaged = $pager->setMaxPerPage( 10 )->setCurrentPage( $page )->getCurrentPageResults();
        return compact('pager','albumsPaged','musicien');
    }

    /**
     * @param Musicien $musicien
     * @Route("/albums/chef/{codeMusicien}/page/{page}", requirements={"codeMusicien"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumChef")
     * @Template("ProjetWebClassiqueBundle:Album:musicien.html.twig")
     */
    public function chefAction( Musicien $musicien, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByChef($musicien);
        $albumsPaged = $pager->setMaxPerPage( 10 )->setCurrentPage( $page )->getCurrentPageResults();
        return compact('pager','albumsPaged','musicien');
    }

    /**
     * @param Musicien $musicien
     * @Route("/albums/orchestre/{codeOrchestre}/page/{page}", requirements={"codeOrchestre"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumOrchestre")
     * @Template("ProjetWebClassiqueBundle:Album:orchestre.html.twig")
     */
    public function orchestreAction( Orchestres $orchestre, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByOrchestre($orchestre);
        $albumsPaged = $pager->setMaxPerPage( 10 )->setCurrentPage( $page )->getCurrentPageResults();
        return compact('pager','albumsPaged','orchestre');
    }

    /**
     * @Route("/albums/genre/{codeGenre}/page/{page}", requirements={"codeGenre"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumGenre")
     * @param Genre $genre
     * @Template("ProjetWebClassiqueBundle:Album:genre.html.twig")
     */
    public function genreAction( Genre $genre , $page = 1) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByGenre($genre);
        $albumsPaged = $pager->setMaxPerPage( 10 )->setCurrentPage( $page )->getCurrentPageResults();
        return compact('pager','albumsPaged','genre');
    }

    /**
     * @param Instrument instrument
     * @Route("/albums/instrument/{codeInstrument}/page/{page}", requirements={"codeGenre"="\d+", "page"="\d+"}, defaults={"page"=1}, name="albumGenre")
     * @Template("ProjetWebClassiqueBundle:Album:instrument.html.twig")
     */
    public function instrumentAction( Instrument $instrument, $page = 1 ) {
        $pager = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:Album")->findByInstrument($instrument);
        $albumsPaged = $pager->setMaxPerPage( 10 )->setCurrentPage( $page )->getCurrentPageResults();
        return compact('pager','albumsPaged','instrument');
    }


}
