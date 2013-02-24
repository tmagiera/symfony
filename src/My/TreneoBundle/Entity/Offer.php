<?php

namespace My\TreneoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM|Entity
 * @ORM|Table(name="offer")
 */
class Offer
{
    /**
     * @ORM|Id
     * @ORM|Column(type="integer")
     * @ORM|GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM|OneToMany(targetEntity="Comment", mappedBy="offerId", cascade={"ALL"}, indexBy="id")
     */
    protected $comments;

    /**
     * @ORM|Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM|Column(type="string", length=100)
     */
    protected $surname;

    /**
     * @ORM|Column(type="string")
     */
    protected $email;

    /**
     * @ORM|Column(type="string")
     */
    protected $site;

    /**
     * @ORM|Column(type="string", length=100)
     */
    protected $phone;

    /**
     * @ORM|Column(type="string")
     */
    protected $specialization;

    /**
     * @ORM|Column(type="text")
     */
    protected $description;

    /**
     * @ORM|Column(type="datetime")
     */
    protected $createdDate;

    /**
     * @ORM|Column(type="datetime")
     */
    protected $updatedDate;

    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
    }
}
?>