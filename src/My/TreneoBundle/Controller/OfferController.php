<?php

namespace My\TreneoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use My\TreneoBundle\Entity\Offer;
use My\TreneoBundle\Entity\Comment;
use My\TreneoBundle\Form\OfferType;
use My\TreneoBundle\Form\CommentType;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Templating\Helper\MapHelper;
use Ivory\GoogleMap\Overlays\Animation;
use Ivory\GoogleMap\Overlays\Marker;

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

    public function showAction($id, $slug)
    {
        $offer = $this->getDoctrine()->getRepository("MyTreneoBundle:Offer")->find($id);

        if (!$offer)
            throw $this->createNotFoundException("Nie mogę znaleźć oferty");

        $comment = new Comment();
        $form = $this->createForm(new CommentType(), $comment);

        $map = new Map();
        $map->setMapOption('zoom', 5);
        $map->setLanguage('pl');
        $map->setCenter(52,20);

        $marker = new Marker();
        $marker->setPosition(52, 20, true);
        $marker->setAnimation(Animation::DROP);
        $map->addMarker($marker);

        $mapHelper = new MapHelper();

        return $this->render('MyTreneoBundle:Offer:show.html.twig', array(
            "offer" => $offer,
            "map_container" => $mapHelper->renderContainer($map),
            "map_javascript" => $mapHelper->renderJavascripts($map),
            "form" => $form->createView()
        ));
    }
}
