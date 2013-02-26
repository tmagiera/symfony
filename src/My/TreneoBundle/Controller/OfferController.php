<?php

namespace My\TreneoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use My\TreneoBundle\Entity\Offer;
use My\TreneoBundle\Entity\Comment;
use My\TreneoBundle\Form\OfferType;
use My\TreneoBundle\Form\CommentType;

class OfferController extends Controller
{
    public function showAddFormAction()
    {
        $offer = new Offer();
        $form = $this->createForm(new OfferType(), $offer);

        return $this->render('MyTreneoBundle:Offer:form.html.twig', array(
                "form" => $form->createView()
        ));
    }

    public function createAction()
    {
        $offer = new Offer();
        $request = $this->getRequest();
        $form = $this->createForm(new OfferType(), $offer)->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offer);
            $em->flush();

            return $this->render("MyTreneoBundle:Offer:success.html.twig", array(
                "offer" => $offer
            ));
        }

        return $this->render('MyTreneoBundle:Offer:form.html.twig', array(
                "form" => $form->createView()
        ));
    }

    public function showAction($id)
    {
        $offer = $this->getDoctrine()->getRepository("MyTreneoBundle:Offer")->find($id);

        if (!$offer)
            throw $this->createNotFoundException("Nie mogę znaleźć oferty");

        $comment = new Comment();
        $form = $this->createForm(new CommentType(), $comment);

        return $this->render('MyTreneoBundle:Offer:show.html.twig', array(
            "offer" => $offer,
            "form" => $form->createView()
        ));
    }
}
