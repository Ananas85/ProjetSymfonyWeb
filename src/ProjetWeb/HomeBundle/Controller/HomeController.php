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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class HomeController extends Controller {

    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction() {
        return [];
    }

    /**
     * @Route("/about", name="aboutpage")
     * @Template()
     */
	public function aboutAction() {
		return [];
	}
} 