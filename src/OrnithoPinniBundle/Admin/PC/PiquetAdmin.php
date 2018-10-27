<?php
namespace OrnithoPinniBundle\Admin\PC;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\CoreBundle\Form\Type\DatePickerType;

class PiquetAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $list = $this->getConfigurationPool()->getContainer()->get('static_list');
      $formMapper
      ->with('Localisation', array('class' => 'col-md-12'))
          ->add('releve', 'sonata_type_admin', array(
              'label' => 'Relevé *',
              'required' => false
          ))
      ->end()
      ->with('Relevé', array('class' => 'col-md-12'))
          ->add('codePiquet', null, array(
              'label' => "Code du piquet *",
              'required' => false
          ))
          ->add('datePremierReleve', DatePickerType::class, array(
              'label' => 'Date du premier relevé',
              'format'=>'dd/MM/yyyy',
              'required' => false
          ))
          ->add('dateDernierReleve', DatePickerType::class, array(
              'label' => 'Date du dernier relevé',
              'format'=>'dd/MM/yyyy',
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
      ->end()
      ->with('Site', array('class' => 'col-md-12'))
          ->add('site', null, array(
              'label' => "Site *",
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
                  ->addViolation("Le relevé doit être renseigné")
              ->end()
          ;
      }
      if($object->getSite()==null){
          $errorElement
              ->with('site')
                  ->addViolation("Le site doit être renseigné")
              ->end()
          ;
      }
      if($object->getCodePiquet()==null){
          $errorElement
              ->with('codePiquet')
                  ->addViolation("Le code du piquet doit être renseigné")
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
    }
}
