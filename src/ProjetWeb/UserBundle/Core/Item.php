<?php
namespace ProjetWeb\UserBundle\Core;

class Item
{
    /**
     * @var object
     */
    private $product;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @return object
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param object $product
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        if ( $quantity < 0 ) {
            $quantity = 0;
        }
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return double
     */
    public function getPrice() {
        return $this->getQuantity() * $this->product->getPrice();
    }
}