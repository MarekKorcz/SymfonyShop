<?php

namespace ShopBundle\Entity;

//use ShopBundle\Entity\Section;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Section", inversedBy="categories")
     * @ORM\JoinColumn(name="section_id", referencedColumnName="id")
     */
    private $section;
    
    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category", cascade={"All"})
     */
    private $products;

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
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    public function setSection($section){
        
        $this->section = $section;
        
        return $this;
    }
    
    public function getSection(){
        
        return $this->section;
    }
    
    public function getProducts(){
        
        return $this->products;
    }
    
    public function __toString(){

        return $this->getName();
    }
    
    public function __construct(){
        
        $this->products = new ArrayCollection();
    }
}
