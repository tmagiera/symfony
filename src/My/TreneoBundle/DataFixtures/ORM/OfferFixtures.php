<?php
namespace My\TreneoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use My\TreneoBundle\Entity\Offer;

class OfferFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $offer1 = new Offer();
        $offer1->setName("Janek1");
        $offer1->setSurname("Poranek1");
        $offer1->setEmail("tadeusz.magiera+janek1@gmail.com");
        $offer1->setDescription("Loresm ipsum dolor, Loresm ipsum dolor ,Loresm ipsum dolor");
        $offer1->setPhone("600-600-600");
        $offer1->setSite("www.treneo.pl");
        $offer1->setSpecialization("masaz");
        $manager->persist($offer1);

        $offer2 = new Offer();
        $offer2->setName("Janek2");
        $offer2->setSurname("Poranek2");
        $offer2->setEmail("tadeusz.magiera+janek2@gmail.com");
        $offer2->setDescription("Loresm ipsum dolor, Loresm ipsum dolor ,Loresm ipsum dolor");
        $offer2->setPhone("600-600-600");
        $offer2->setSite("www.treneo.pl");
        $offer2->setSpecialization("masaz");
        $manager->persist($offer2);

        $offer3 = new Offer();
        $offer3->setName("Janek3");
        $offer3->setSurname("Poranek3");
        $offer3->setEmail("tadeusz.magiera+janek3@gmail.com");
        $offer3->setDescription("Loresm ipsum dolor, Loresm ipsum dolor ,Loresm ipsum dolor");
        $offer3->setPhone("600-600-600");
        $offer3->setSite("www.treneo.pl");
        $offer3->setSpecialization("masaz");
        $manager->persist($offer3);

        $offer4 = new Offer();
        $offer4->setName("Janek4");
        $offer4->setSurname("Poranek4");
        $offer4->setEmail("tadeusz.magiera+janek4@gmail.com");
        $offer4->setDescription("Loresm ipsum dolor, Loresm ipsum dolor ,Loresm ipsum dolor");
        $offer4->setPhone("600-600-600");
        $offer4->setSite("www.treneo.pl");
        $offer4->setSpecialization("masaz");
        $manager->persist($offer4);

        $manager->flush();

        $this->addReference("offer-1", $offer1);
        $this->addReference('offer-2', $offer2);
        $this->addReference('offer-3', $offer3);
        $this->addReference('offer-4', $offer4);
    }

    public function getOrder()
    {
        return 1;
    }
}

?>