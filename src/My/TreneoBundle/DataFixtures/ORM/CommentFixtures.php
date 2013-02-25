<?php
namespace My\TreneoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use My\TreneoBundle\Entity\Offer;
use My\TreneoBundle\Entity\Comment;

class CommentFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $comment1 = new Comment();
        $comment1->setEmail("tadeusz.magiera+komentator1@gmail.com");
        $comment1->setContent("Komentarski komentarz");
        $comment1->setOfferId($this->getReference('offer-1'));
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2->setEmail("tadeusz.magiera+komentator2@gmail.com");
        $comment2->setContent("Komentarski komentarz");
        $comment2->setOfferId($this->getReference('offer-1'));
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3->setEmail("tadeusz.magiera+komentator3@gmail.com");
        $comment3->setContent("Komentarski komentarz");
        $comment3->setOfferId($this->getReference('offer-2'));
        $manager->persist($comment3);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}

?>