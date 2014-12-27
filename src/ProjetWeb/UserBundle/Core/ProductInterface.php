<?php
namespace ProjetWeb\UserBundle\Core;

interface ProductInterface
{
    /**
     * @return string
     */
    public function getkey();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return double
     */
    public function getPrice();
}