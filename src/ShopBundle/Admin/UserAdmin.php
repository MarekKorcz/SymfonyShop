<?php

namespace ShopBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class UserAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username', array(
                'label' => 'Username'
            ))
            ->add('email', array(
                'label' => 'Email'
            ))
            ->add('last_login', array(
                'label' => 'Last login'
            ))
            ->add('roles', array(
                'label' => 'Role'
            ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
       $datagridMapper
            ->add('username', array(
                'label' => 'Username'
            ))
            ->add('email', array(
                'label' => 'Email'
            ))
            ->add('last_login', array(
                'label' => 'Last login'
            ))
            ->add('roles', array(
                'label' => 'Role'
            ))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('username', array(
                'label' => 'Username'
            ))
            ->add('email', array(
                'label' => 'Email'
            ))
            ->add('last_login', array(
                'label' => 'Last login'
            ))
            ->add('roles', array(
                'label' => 'Role'
            ))
        ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username', array(
                'label' => 'Username'
            ))
            ->add('email', array(
                'label' => 'Email'
            ))
            ->add('last_login', array(
                'label' => 'Last login'
            ))
            ->add('roles', array(
                'label' => 'Role'
            ))
        ;
    }
}