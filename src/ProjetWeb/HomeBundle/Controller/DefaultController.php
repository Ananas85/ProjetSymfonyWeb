<?php

namespace ProjetWeb\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjetWebHomeBundle:Default:index.html.twig', array('name' => $name));
    }
}
