<?php

namespace ProjetWeb\UserBundle\Core;

class Cart
{
    /**
     * @var array
     */
    private $items;

    /**
     *
     */
    public function __construct()
    {
        $this->items = array();
    }


    /**
     * @param ProductInterface $product
     * @param int              $quantity
     */
    public function addItem(ProductInterface $product, $quantity = 1)
    {
        if (array_key_exists($product->getkey(), $this->items)) {
            /**
             * @var Item $item
             */
            $item = $this->items[$product->getkey()];
            $item->setQuantity($item->getQuantity() + $quantity);

            return $this;
        }
        $item = new Item($product, $quantity);
        $item->setProduct($product);
        $item->setQuantity($quantity);
        $this->items[$product->getkey()] = $item;

        return $this;
    }

    /**
     * @param ProductInterface $product
     * @param int              $quantity
     *
     * @return $this
     */
    public function removeItem(ProductInterface $product, $quantity = 1)
    {
        if (array_key_exists($product->getkey(), $this->items)) {
            /**
             * @var Item $item
             */
            $item = $this->items[$product->getkey()];
            $item->setQuantity($item->getQuantity() - $quantity);
            if ($item->getQuantity() == 0) {
                unset($this->items[$product->getkey()]);
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getItemsQuantity()
    {
        $count = 0;
        foreach ($this->items as $item) {
            /**
             * @var Item $item
             */
            $count += $item->getQuantity();
        }

        return $count;
    }

    /**
     * @return double
     */
    public function getPriceHT()
    {
        $count = 0;
        foreach ($this->items as $item) {
            /**
             * @var Item $item
             */
            $count += $item->getPrice();
        }

        return $count;
    }

    /**
     * @return int
     */
    public function getTVA()
    {
        return 20;
    }

    /**
     * @return float
     */
    public function getPriceTTC()
    {
        return $this->getPriceHT() * (1 + $this->getTVA() / 100);
    }

}