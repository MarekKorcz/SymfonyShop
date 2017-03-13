<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\UserOrder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Userorder controller.
 *
 * @Route("order")
 */
class UserOrderController extends Controller
{
    /**
     * Lists all userOrder entities.
     *
     * @Route("/", name="order_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userOrders = $em->getRepository('ShopBundle:UserOrder')->findAll();

        return $this->render('userorder/index.html.twig', array(
            'userOrders' => $userOrders,
        ));
    }

    /**
     * Creates a new userOrder entity.
     *
     * @Route("/new", name="order_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $userOrder = new Userorder();
        $form = $this->createForm('ShopBundle\Form\UserOrderType', $userOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userOrder);
            $em->flush($userOrder);

            return $this->redirectToRoute('order_show', array('id' => $userOrder->getId()));
        }

        return $this->render('userorder/new.html.twig', array(
            'userOrder' => $userOrder,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a userOrder entity.
     *
     * @Route("/{id}", name="order_show")
     * @Method("GET")
     */
    public function showAction(UserOrder $userOrder)
    {
        $deleteForm = $this->createDeleteForm($userOrder);

        return $this->render('userorder/show.html.twig', array(
            'userOrder' => $userOrder,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing userOrder entity.
     *
     * @Route("/{id}/edit", name="order_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, UserOrder $userOrder)
    {
        $deleteForm = $this->createDeleteForm($userOrder);
        $editForm = $this->createForm('ShopBundle\Form\UserOrderType', $userOrder);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('order_edit', array('id' => $userOrder->getId()));
        }

        return $this->render('userorder/edit.html.twig', array(
            'userOrder' => $userOrder,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a userOrder entity.
     *
     * @Route("/{id}", name="order_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, UserOrder $userOrder)
    {
        $form = $this->createDeleteForm($userOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userOrder);
            $em->flush();
        }

        return $this->redirectToRoute('order_index');
    }

    /**
     * Creates a form to delete a userOrder entity.
     *
     * @param UserOrder $userOrder The userOrder entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UserOrder $userOrder)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('order_delete', array('id' => $userOrder->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
