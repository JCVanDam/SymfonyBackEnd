<?php

namespace FrequentationBundle\Admin;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ManipeurAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        // ->add('Users', EntityType::class, [
        //         'class' => 'FrequentationBundle\Entity\User',
        //         'multiple' => true,
        //       ])
        ->add('statut','checkbox');
    }

    public function preValidate($object)
    {
    }
}
