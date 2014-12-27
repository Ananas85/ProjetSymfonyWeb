<?php
namespace ProjetWeb\UserBundle\Core;

class Item implements \Serializable
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
     * Optimise le stockage en session
     * @var string
     */
    private $key;

    /**
     * Optimise le stockage en session
     * @return string
     */
    public function serialize()
    {
        return serialize([ $this->key, $this->quantity ]);
    }

    /**
     * Optimise le stockage en session
     *
     * @param string $data
     */
    public function unserialize($data)
    {
        $tmp            = unserialize($data);
        $this->key      = $tmp[0];
        $this->quantity = $tmp[1];
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

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
        $this->key = $product->getKey();
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
        if ($quantity < 0) {
            $quantity = 0;
        }
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->getQuantity() * $this->product->getPrice();
    }
}