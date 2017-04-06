<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     */
    protected $username;
    
    /**
     * @ORM\OneToMany(targetEntity="UserOrder", mappedBy="user", cascade={"All"})
     */
    private $userOrders;
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user", cascade={"All"})
     */
    private $comments;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getUserOrders(){
        
        return $this->userOrders;
    }
    
    public function getComments(){
        
        return $this->comments;
    }
    
    public function __toString(){
        
        return $this->getUsername();
    }
    
    public function __construct(){

        parent:: __construct();
        
        $this->userOrders = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }
}
