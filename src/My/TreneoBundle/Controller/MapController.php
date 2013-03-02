<?php

namespace My\TreneoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Templating\Helper\MapHelper;
use Ivory\GoogleMap\Overlays\Animation;
use Ivory\GoogleMap\Overlays\Marker;

class MapController extends Controller
{
    public function viewAction($lat = 52, $lang = 20)
    {
        $map = new Map();
        $map->setMapOption('zoom', 5);
        $map->setLanguage('pl');
        $map->setCenter($lat, $lang);
        $map->setAsync(true);

        $marker = new Marker();
        $marker->setPosition($lat, $lang, true);
        $marker->setAnimation(Animation::DROP);
        $map->addMarker($marker);

        $mapHelper = new MapHelper();

        return $this->render('MyTreneoBundle:Map:view.html.twig', array(
            "map_container" => $mapHelper->renderContainer($map),
            "map_javascript" => $mapHelper->renderJavascripts($map)
        ));
    }
}
