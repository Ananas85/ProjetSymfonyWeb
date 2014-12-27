<?php
namespace ProjetWeb\ClassiqueBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MusicianController extends Controller
{

    /**
     * @param Musicien $musicien
     * @Route("/musicien/image/{codeMusicien}", requirements={"codeMusicien"="\d+"}, name="musicienimage")
     *
     * @return Response
     */
    public function imageAction(Musicien $musicien)
    {
        $fs = new Filesystem();

        $path = $this->get('service_container')->getParameter('img_musicien_storage');
        if (!$fs->exists($path)){
            $fs->mkdir($path);
        }

        $file = "{$path}/Musicien-{$musicien->getCodeMusicien()}.jpeg";

        $response = new Response();
        $response->headers->set('Content-type', 'image/jpeg');
        $response->headers->set('Content-Transfer-Encoding', 'binary');

        if ( !$fs->exists($file))
        {
            $image    = stream_get_contents($musicien->getPhoto());
            //$image    = pack("H*", $image);
            file_put_contents($file,$image);
            return $response->setContent($image);
        }
        $response->setMaxAge(3600);
        return $response->setContent(file_get_contents($file));
    }
}