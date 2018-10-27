<?php

namespace FrequentationBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->add('first_name', 'text')
        ->add('name', 'text')
        ->add('email', 'email')
        ->add('enabled', 'checkbox')
        ->add('name', 'text')
        ->add('programme', EntityType::class, [
                'class' => 'FrequentationBundle\Entity\Programme',
        ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('username', 'text')
        ->add('name', 'text')
        ->add('email', 'email')
        ;
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        //$datagridMapper
        //     ->add('title')
        //     ->add('category', null, [], 'entity', [
        //         'class'    => 'FrequentationBundle\Entity\Category',
        //         'choice_label' => 'name', // In Symfony2: 'property' => 'name'
        //     ])
        // ;
    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }

    public function prePersist($object)
    {
        $username= $object->getEmail();
        $roles=array();
        $object->setRoles($roles);
        $object->setUsername($username);
        $object->setUsernameCanonical($username);
    }
}
