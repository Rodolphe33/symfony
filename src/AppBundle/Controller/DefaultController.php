<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Article;

class DefaultController extends Controller
{
    
    public function indexAction(Request $request)
    {
       $em = $this->getDoctrine()->getRepository(Article::class);
       $articles = $em->getByAuteurAndNom('popov33', 'POPOV');

       return $this->render('AppBundle:Default:index.html.twig', array(
       'articles'=> $articles,
    ));
   }

    public function contactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/Default/contact.html.twig');
    }

    public function articleAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/Default/article.html.twig');
    }
}
