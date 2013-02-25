<?php

namespace My\TreneoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OfferController extends Controller
{
    public function addAction()
    {
        return $this->render('MyTreneoBundle:Offer:add.html.twig');
    }

    public function showAction($id)
    {
        $offer = $this->getDoctrine()->getRepository("MyTreneoBundle:Offer")->find($id);

        if (!$offer)
            throw $this->createNotFoundException("Nie mogę znaleźć oferty");

        return $this->render('MyTreneoBundle:Offer:show.html.twig', array("offer" => $offer));
    }

}
