<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product_Order
 *
 * @ORM\Table(name="product__order")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\Product_OrderRepository")
 */
class Product_Order
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
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;
    
    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productOrders")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;
    
    /**
     * @ORM\ManyToOne(targetEntity="UserOrder", inversedBy="productOrders")
     * @ORM\JoinColumn(name="userOrder_id", referencedColumnName="id")
     */
    private $userOrder;


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
     * Set amount
     *
     * @param integer $amount
     * @return Product_Order
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
