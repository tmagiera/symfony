<?php

namespace My\TreneoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use My\TreneoBundle\Entity\Offer;
use My\TreneoBundle\Entity\Comment;
use My\TreneoBundle\Form\CommentType;

class CommentController extends Controller
{
    public function addAction($offer_id)
    {
        $comment = new Comment();
        $offer = $this->getDoctrine()->getRepository("MyTreneoBundle:Offer")->find($offer_id);
        $comment->setOfferId($offer);
        $request = $this->getRequest();
        $form = $this->createForm(new CommentType(), $comment)->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('_offer_show', array(
                "id" => $offer->getId()
            )));
        }
    }

    public function listAction(Offer $offer) {
        return $this->render('MyTreneoBundle:Comment:list.html.twig', array(
            "offer" => $offer
        ));
    }

    public function formAction(Offer $offer) {
        $comment = new Comment();
        $form = $this->createForm(new CommentType(), $comment);

        return $this->render('MyTreneoBundle:Comment:add.html.twig', array(
            "offer" => $offer,
            "form" => $form->createView()
        ));
    }
}
