<?php

namespace My\TreneoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use My\TreneoBundle\Entity\Offer;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Templating\Helper\MapHelper;
use Ivory\GoogleMap\Overlays\Animation;
use Ivory\GoogleMap\Overlays\Marker;

class MapController extends Controller
{
    public function viewAction(Offer $offer)
    {
        $map = new Map();
        $map->setMapOption('zoom', 5);
        $map->setLanguage('pl');
        $map->setCenter(52,20);

        $marker = new Marker();
        $marker->setPosition(52, 20, true);
        $marker->setAnimation(Animation::DROP);
        $map->addMarker($marker);

        $mapHelper = new MapHelper();

        return $this->render('MyTreneoBundle:Map:view.html.twig', array(
            "map_container" => $mapHelper->renderContainer($map),
            "map_javascript" => $mapHelper->renderJavascripts($map)
        ));
    }
}
