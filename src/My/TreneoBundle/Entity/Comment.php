<?php

namespace My\TreneoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM|Entity
 * @ORM|Table(name="comment")
 */
class Comment
{
    /**
     * @ORM|Id
     * @ORM|Column(type="integer")
     * @ORM|GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM|Id
     * @ORM|Column(type="integer")
     * @ORM|ManyToOne(targetEntity="Offer", inversedBy="comments")
    */
    protected $offerId;

    /**
     * @ORM|Column(type="string", length=100)
     */
    protected $email;

    /**
     * @ORM|Column(type="text")
     */
    protected $content;
}
?>