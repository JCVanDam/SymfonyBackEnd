<?php
namespace OrnithoPinniBundle\Admin\PC;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class PointComptageTransectAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $list = $this->getConfigurationPool()->getContainer()->get('static_list');
      $formMapper
      ->with('Localisation', array('class' => 'col-md-12'))
          ->add('releve', 'sonata_type_admin', array(
              'label' => 'Relevé *',
              'required' => false
          ))
      ->end()
      ->with('Point comptage', array('class' => 'col-md-12'))
          ->add('protocole', 'sonata_type_model_hidden')
          ->add('vegetation', null, array(
              'label' => "Végétation *",
              'required' => false
          ))
          ->add('pente', 'choice', array(
              'choices' => $list->getPentes(),
              'label' => "Pente *",
              'placeholder' => 'Choisir...',
              'required' => false
          ))
          ->add('orientationPente', 'choice', array(
              'choices' => $list->getOrientationsPente(),
              'label' => "Orientation *",
              'placeholder' => 'Choisir...',
              'required' => false
          ))
          ->add('idPtComptage', null, array(
              'label' => "Point de comptage",
              'required' => false
          ))
          ->add('numeroTransect', null, array(
              'label' => "Numéro du transect",
              'required' => false
          ))
          ->add('distance', null, array(
              'label' => "Distance au point précédent",
              'required' => false,
              'attr' => array('min' => '0')
          ))
      ->end()
      ->with('Observateur', array('class' => 'col-md-12'))
          ->add('observateur', null, array(
              'label' => "Observateur",
              'required' => false
          ))
      ->end()
      ->with('Terriers', array('class' => 'col-md-12'))
          ->add('terriers', 'sonata_type_collection', array(
              'required' => false,
              'label' => 'Terriers',
              'by_reference' => false
          ),array(
              'edit' => 'inline',
              'inline' => 'table'
          ))
          ->add('remarque', null, array(
              'label' => "Remarque",
              'required' => false
          ))
      ->end()
      ;
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper
            ->add('_action', null, array(
               'actions' => array(
                   'show' => array(),
                   'edit' => array(),
                   'delete' => array()
               )
            ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object){
      if($object->getReleve()==null){
          $errorElement
              ->with('releve')
                  ->addViolation("Le relevé doit être renseignée")
              ->end()
          ;
      }
      if($object->getOrientationPente()==null){
          $errorElement
              ->with('orientationPente')
                  ->addViolation("L'orientation de la pente doit être renseignée")
              ->end()
          ;
      }
      if($object->getPente()==null){
          $errorElement
              ->with('pente')
                  ->addViolation("La pente doit être renseignée")
              ->end()
          ;
      }
      if($object->getVegetation()==null){
          $errorElement
              ->with('vegetation')
                  ->addViolation("La végétation doit être renseignée")
              ->end()
          ;
      }
    }

      /*
       * Permet de gérer le lien inverse si imbrication première
       * N'est pas appelé si non executé depuis cet admin
       */
      public function prePersist($o){
          $this->toExecute($o);
      }
      public function preUpdate($o){
          $this->toExecute($o);
      }

      public function toExecute($o){
          foreach($o->getTerriers() as $child){
              $child->setPointComptageTransect($o);
          }
      }
}
