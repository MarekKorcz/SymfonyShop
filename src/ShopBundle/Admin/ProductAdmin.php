<?php

namespace ShopBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class ProductAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array(
                'label' => 'Product name'
            ))
            ->add('description', 'text', array(
                'label' => 'Product description'
            ))
            ->add('price', 'number', array(
                'label' => 'Product description'
            ))
            ->add('category', 'entity', array(
                'class' => 'ShopBundle\Entity\Category'
            ))
            ->add('comments', 'entity', array(
                'class' => 'ShopBundle\Entity\Comment'
            ))
            ->add('order', 'entity', array(
                'class' => 'ShopBundle\Entity\Product_Order'
            ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
       $datagridMapper
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('category')
            ->add('comments')
            ->add('order')
       ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('description')
            ->add('price')
            ->add('category')
            ->add('comments')
            ->add('order')
       ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
           ->add('name')
           ->add('description')
           ->add('price')
           ->add('category')
           ->add('comments')
           ->add('order')
       ;
    }
}