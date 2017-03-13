<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Product_Order;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Product_order controller.
 *
 * @Route("product_order")
 */
class Product_OrderController extends Controller
{
    /**
     * Lists all product_Order entities.
     *
     * @Route("/", name="product_order_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $product_Orders = $em->getRepository('ShopBundle:Product_Order')->findAll();

        return $this->render('product_order/index.html.twig', array(
            'product_Orders' => $product_Orders,
        ));
    }

    /**
     * Creates a new product_Order entity.
     *
     * @Route("/new", name="product_order_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $product_Order = new Product_order();
        $form = $this->createForm('ShopBundle\Form\Product_OrderType', $product_Order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product_Order);
            $em->flush($product_Order);

            return $this->redirectToRoute('product_order_show', array('id' => $product_Order->getId()));
        }

        return $this->render('product_order/new.html.twig', array(
            'product_Order' => $product_Order,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a product_Order entity.
     *
     * @Route("/{id}", name="product_order_show")
     * @Method("GET")
     */
    public function showAction(Product_Order $product_Order)
    {
        $deleteForm = $this->createDeleteForm($product_Order);

        return $this->render('product_order/show.html.twig', array(
            'product_Order' => $product_Order,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing product_Order entity.
     *
     * @Route("/{id}/edit", name="product_order_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Product_Order $product_Order)
    {
        $deleteForm = $this->createDeleteForm($product_Order);
        $editForm = $this->createForm('ShopBundle\Form\Product_OrderType', $product_Order);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('product_order_edit', array('id' => $product_Order->getId()));
        }

        return $this->render('product_order/edit.html.twig', array(
            'product_Order' => $product_Order,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a product_Order entity.
     *
     * @Route("/{id}", name="product_order_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Product_Order $product_Order)
    {
        $form = $this->createDeleteForm($product_Order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($product_Order);
            $em->flush();
        }

        return $this->redirectToRoute('product_order_index');
    }

    /**
     * Creates a form to delete a product_Order entity.
     *
     * @param Product_Order $product_Order The product_Order entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Product_Order $product_Order)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_order_delete', array('id' => $product_Order->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
