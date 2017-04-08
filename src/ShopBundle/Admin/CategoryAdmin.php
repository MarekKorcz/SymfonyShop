<?php

namespace ShopBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class CategoryAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Category', array('class' => 'col-md-6'))
                ->add('name', 'text', array(
                    'label' => 'Name:'
                ))
            ->end()
            ->with('Section', array('class' => 'col-md-6'))
                ->add('section', 'entity', array(
                    'class' => 'ShopBundle\Entity\Section',
                    'label' => 'Name (pick one):'
                ))
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
       $datagridMapper
            ->add('name')
            ->add('section')
            ->add('products')
       ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('section')
            ->add('products')
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
           ->add('section')
           ->add('products')
       ;
    }
}