<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Contact;


class DefaultController extends Controller {

    public function indexAction(Request $request)
    {
        
        return $this->render('@App/Default/index.html.twig');
    }

    public function contactAction(Request $request)
    {

        $contact = new Contact();
        $form = $this->createForm('AppBundle\Form\ContactType', $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $this->addFlash(
                    'success', 'Demande de contact enregistrée !'
            );

            return $this->redirectToRoute('contact');
        }
        if ($form->isSubmitted() && !$form->isValid())
        {

            $this->addFlash(
                    'danger', 'Le contact n\'est pas enregistré !'
            );

            return $this->redirectToRoute('contact');
        }
        return $this->render('AppBundle:Default:contact.html.twig', array(
                    'contact' => $contact,
                    'form' => $form->createView(),
        ));
    }

}
