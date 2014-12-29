<?php
namespace ProjetWeb\UserBundle\Manager;

use ProjetWeb\UserBundle\Core\Item;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use ProjetWeb\UserBundle\Core\ProductInterface;
use ProjetWeb\UserBundle\Core\Cart as CartSessionObject;
use Doctrine\ORM\EntityManager;

class Cart
{
    const SESSION_CART_KEY = "user_cart";
    /**
     * @var SessionInterface
     */
    private $session;


    /**
     * @var CartSessionObject
     */
    private $cart;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session, EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->session = $session;
    }

    /**
     * @return CartSessionObject
     */
    public function getCart()
    {
        if (!$this->cart) {
            if (!$this->session->has(self::SESSION_CART_KEY)) {
                $this->session->set(self::SESSION_CART_KEY, new CartSessionObject());
            }
            $this->cart = $this->session->get(self::SESSION_CART_KEY);
            $items      = $this->cart->getItems();
            foreach ($items as $item) {
                /**
                 * @var Item $item
                 */
                list($entityName, $code) = explode("-", $item->getKey());
                $product = $this->entityManager->getRepository("ProjetWebClassiqueBundle:{$entityName}")->findOneBy(
                    [ "code{$entityName}" => $code ]
                );
                $item->setProduct($product);
            }
        }

        return $this->cart;
    }

    /**
     * @param ProductInterface $product
     * @param int              $quantity
     */
    public function addProduct(ProductInterface $product, $quantity = 1)
    {
        $cart = $this->getCart();
        $cart->addItem($product, $quantity);
    }

    /**
     * @param ProductInterface $product
     * @param int              $quantity
     */
    public function removeProduct(ProductInterface $product, $quantity = 1)
    {
        $cart = $this->getCart();
        $cart->removeItem($product, $quantity);
    }

    /**
     * @param ProductInterface $product
     */
    public function deleteProduct(ProductInterface $product)
    {
        $cart = $this->getCart();
        $cart->deleteItem($product);
    }
}