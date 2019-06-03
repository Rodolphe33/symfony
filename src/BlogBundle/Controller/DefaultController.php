<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogBundle\Entity\Article;

class DefaultController extends Controller {

    public function indexAction()
    {
        $article = $this->getDoctrine()
                ->getRepository(Article::class)
                ->findAll();
        return $this->render('BlogBundle:Default:index.html.twig', array('article' => $article));
    }

}
