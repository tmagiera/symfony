<?php
namespace Blogger\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OfferControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/offer/create/');
        $this->assertTrue($crawler->filter('html:contains("Dodaj")')->count() > 0);
    }
}
?>