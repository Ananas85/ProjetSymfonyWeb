<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-10-2014
 * Time: 11:35
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class HomeController extends Controller {

    public function indexAction() {
        return $this->render('ProjetWebHomeBundle:Home:index.html.twig', array());
    }
	
	public function aboutAction() {
		return $this->render('ProjetWebHomeBundle:Home:about.html.twig',array());
	}
} 