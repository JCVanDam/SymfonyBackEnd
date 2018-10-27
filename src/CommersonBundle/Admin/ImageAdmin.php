<?php

namespace CommersonBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ImageAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
            ->add('observation', null, array(
                  'label' => "Code de l'observation",
                  'class' => 'CommersonBundle\Entity\Observation',
                  'choice_label' => 'code_observation'
            ))
            ->add('file', 'file', [
                'label' => 'Image'
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper
            ->add('id', null, [
                'label' => 'Identifiant'
            ])
            ->add('filename', null, [
                'label' => 'Nom du fichier'
            ])
            ->add('file', null,
                array(
                    'template' => 'CommersonBundle:Admin:image_list_type.html.twig'
                )
            )
            ->add('_action', null, array(
              'actions' => array(
                 'show' => array(),
                 'edit' => array(),
                 'delete' => array()
              )
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        $datagridMapper->add('observation', null, array(
                            'label' => 'Observation'
                        ))
        ;
    }

    public function configureShowFields(ShowMapper $showMapper){
        $showMapper
            ->add('observation', null, array(
                'label' => "Code de l'observation"
            ))
            ->add('file', null,
                array(
                    'template' => 'CommersonBundle:Admin:image_show_type.html.twig'
                )
            )
        ;
    }

}
