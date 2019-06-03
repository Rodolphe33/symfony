<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * One User has many Article. This is the inverse side.
     * @ORM\OneToMany(targetEntity="BlogBundle\Entity\Article", mappedBy="user")
     */
    private $article;
    
    public function __construct() {
        $this->article = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setArticle($article)
    {
        $this->article = $article;
    }


}
    