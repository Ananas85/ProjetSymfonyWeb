<?php
/**
 * 
 * Created by Sébastien Morel.
 * Aka: Ananas
 * Date: 12-14-2014
 * Time: 14:27
 * 
 * Copyright ${PROJECT_AUTHOR} 2014
 */
 

namespace ProjetWeb\ClassiqueBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AlbumController extends Controller{

    public function musicienAction($id) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('
                      SELECT a FROM ProjetWebClassiqueBundle:Album a
                      JOIN ProjetWebClassiqueBundle:Genre g WITH a.codeGenre = g.codeGenre
                      JOIN ProjetWebClassiqueBundle:Musicien m WITH g.codeGenre
                        ')
    }
} 