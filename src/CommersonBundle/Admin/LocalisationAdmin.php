<?php
namespace CommersonBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class LocalisationAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
            ->with('Début', array('class' => 'col-md-12'))
               ->add('latitude_debut', 'number', array(
                     'label' => 'Latitude début'
               ))
               ->add('longitude_debut', null, array(
                     'label' => 'Longitude début'
               ))

               ->add('date_debut','time', array(
                     'label' => 'Heure début',
                     'attr' => ["style" => "width:265px;"]
               ))
               ->add('waypoint_debut', null, array(
                     'label' => 'Waypoint début'
               ))
            ->end()
            ->with('Fin', array('class' => 'col-md-12'))
               ->add('latitude_fin', 'number', array(
                     'label' => 'Latitude fin'
               ))
               ->add('longitude_fin', null, array(
                     'label' => 'Longitude fin'
               ))

               ->add('date_fin','time', array(
                     'label' => 'Heure fin)',
                     'attr' => ["style" => "width:265px;"]
               ))
               ->add('waypoint_fin', null, array(
                     'label' => 'Waypoint fin'
               ))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        $datagridMapper->add('date_debut', null, array(
                            'label' => 'Heure début'
                       ))
                       ->add('date_fin', null, array(
                            'label' => 'Heure fin'
                       ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper
                    ->add('latitude_debut', 'number', array(
                          'label' => 'Latitude début'
                    ))
                    ->add('longitude_debut', null, array(
                          'label' => 'Longitude début'
                    ))

                    ->add('date_debut', null, array(
                          'label' => 'Heure début'
                    ))
                    ->add('waypoint_debut', null, array(
                          'label' => 'Waypoint début'
                    ))
                    ->add('latitude_fin', 'number', array(
                          'label' => 'Latitude fin'
                    ))
                    ->add('longitude_fin', null, array(
                          'label' => 'Longitude fin'
                    ))
                    ->add('date_fin', null, array(
                          'label' => 'Heure fin'
                    ))
                    ->add('waypoint_fin', null, array(
                          'label' => 'Waypoint fin'
                    ))
                    ->add('_action', null, array(
                            'actions' => array(
                            'show' => array(),
                            'edit' => array(),
                            'delete' => array()
                        )
                    ))
        ;
    }

    public function configureShowFields(ShowMapper $showMapper){
      $showMapper
          ->with('Début', array('class' => 'col-md-12'))
             ->add('latitude_debut', 'number', array(
                   'label' => 'Latitude début'
             ))
             ->add('longitude_debut', null, array(
                   'label' => 'Longitude début'
             ))

             ->add('date_debut', null, array(
                   'label' => 'Heure début'
             ))
             ->add('waypoint_debut', null, array(
                   'label' => 'Waypoint début'
             ))
          ->end()
          ->with('Fin', array('class' => 'col-md-12'))
             ->add('latitude_fin', 'number', array(
                   'label' => 'Latitude fin'
             ))
             ->add('longitude_fin', null, array(
                   'label' => 'Longitude fin'
             ))

             ->add('date_fin', null, array(
                   'label' => 'Heure fin)'
             ))
             ->add('waypoint_fin', null, array(
                   'label' => 'Waypoint fin'
             ))
          ->end()
      ;
    }

    /*
     * Pour chaque création d'un objet Localisation
     */
    public function prePersist($loc){
        //setDate($loc);
    }

    /*
     * Pour chaque modification d'un objet Localisation
     */
    public function preUpdate($loc){
        //setDate($loc);
    }

    public function setDate($loc){
        $date = $this->getForm()->get('null_date')->getData();
        $date->setTime($this->getForm()->get('null_heure')->getData()->format('H'), $this->getForm()->get('null_heure')->getData()->format('i'));
        $object->setDate($date);
    }
}
