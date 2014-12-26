<?php
namespace ProjetWeb\UserBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Abonne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/cart")
 */

class CartController extends Controller
{
    /**
     * @Template()
     * @return Response
     */
    public function miniAction()
    {
        return [];
    }


    /**
     * @Route("/show", name="cart_show")
     * @Template()
     * @Security("has_role('ROLE_USER')")
     * @return Response
     */
    public function showAction()
    {
        return [];
    }
}