<?php
namespace ProjetWeb\UserBundle\Controller;

use ProjetWeb\ClassiqueBundle\Entity\Abonne;
use ProjetWeb\UserBundle\Core\ProductInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
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
        return [ 'cart' => $this->get("projetwebclassique.cart_manager")->getCart() ];
    }


    /**
     * @Route("/show", name="cart_show")
     * @Template()
     * @Security("has_role('ROLE_USER')")
     * @return Response
     */
    public function showAction()
    {
        return [ 'cart' => $this->get("projetwebclassique.cart_manager")->getCart() ];
    }

    /**
     * @Route("/add/{key}/{quantity}", name="cart_add_product", requirements={"quantity"="\d+"}, defaults={"quantity"=1},)
     * @Security("has_role('ROLE_USER')")
     * @return Response
     */
    public function addProductAction($key, $quantity = 1)
    {
        list($entityName, $code) = explode("-", $key);
        $product = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:{$entityName}")->findOneBy(
            [ "code{$entityName}" => $code ]
        );
        /**
         * @var ProductInterface $produc
         */
        if (!$product instanceof ProductInterface) {
            throw new AccessDeniedHttpException("Vous ne pouvez pas ajoute ce genre de produit");
        }
        $this->get("projetwebclassique.cart_manager")->addProduct($product, $quantity);

        return $this->redirect($this->generateUrl("cart_show"));
    }

    /**
     * @Route("/remove/{key}/{quantity}", name="cart_remove_product", requirements={"quantity"="\d+"}, defaults={"quantity"=1},)
     * @Security("has_role('ROLE_USER')")
     * @return Response
     */
    public function removeProductAction($key, $quantity = 1)
    {
        list($entityName, $code) = explode("-", $key);
        $product = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:{$entityName}")->findOneBy(
            [ "code{$entityName}" => $code ]
        );
        /**
         * @var ProductInterface $produc
         */
        if (!$product instanceof ProductInterface) {
            throw new AccessDeniedHttpException("Vous ne pouvez pas retirer ce genre de produit");
        }
        $this->get("projetwebclassique.cart_manager")->removeProduct($product, $quantity);

        return $this->redirect($this->generateUrl("cart_show"));
    }

    /**
     * @Route("/delete/{key}", name="cart_delete_product")
     * @Security("has_role('ROLE_USER')")
     * @return Response
     */
    public function deleteProductAction($key)
    {
        list($entityName, $code) = explode("-", $key);
        $product = $this->getDoctrine()->getRepository("ProjetWebClassiqueBundle:{$entityName}")->findOneBy(
            [ "code{$entityName}" => $code ]
        );
        /**
         * @var ProductInterface $produc
         */
        if (!$product instanceof ProductInterface) {
            throw new AccessDeniedHttpException("Vous ne pouvez pas effacer ce genre de produit");
        }
        $this->get("projetwebclassique.cart_manager")->deleteProduct($product);

        return $this->redirect($this->generateUrl("cart_show"));
    }
}