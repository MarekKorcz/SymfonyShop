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
            ->tab('General')
                ->with('Product info', array('class' => 'col-md-6'))
                    ->add('name', 'text', array(
                        'label' => 'Name:'
                    ))
                    ->add('description', 'textarea', array(
                        'label' => 'Description:'
                    ))
                ->end()
                ->with('Price', array('class' => 'col-md-3'))
                    ->add('price', 'number', array(
                        'label' => 'Price:'
                    ))
                ->end()
                ->with('Category', array('class' => 'col-md-3'))
                    ->add('category', 'entity', array(
                        'class' => 'ShopBundle\Entity\Category',
                        'label' => 'Name (pick one):'
                    ))
                ->end()
            ->end()
            ->tab('Images')
            ->end()
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
       ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('description')
            ->add('category')
            ->add('price')
            ->add('_action', null, array(
                'actions' => array(
                    'show'      => array(),
                    'edit'      => array(),
                    'delete'    => array(),
                )
            ))
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
       ;
    }
}