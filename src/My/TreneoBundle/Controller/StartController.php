<?php

namespace My\TreneoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StartController extends Controller
{
    public function indexAction()
    {
        $offers = $this->getDoctrine()->getRepository("MyTreneoBundle:Offer")->getLatestOffers();

        return $this->render('MyTreneoBundle:Start:index.html.twig', array("offers" => $offers));
    }
}
