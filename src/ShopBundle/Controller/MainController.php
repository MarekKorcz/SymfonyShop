<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Product;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    
    /**
     * @Route("/", name="main")
     * @Method({"GET"})
     */
    public function mainPageAction(){
        
        $repo = $this->getDoctrine()->getRepository('ShopBundle:Product');
        
        $allProducts = $repo->findAll();
        
        return $this->render(
            'main/main.html.twig',
            [
                'products' => $allProducts,
            ]
        );
    }
    
}
