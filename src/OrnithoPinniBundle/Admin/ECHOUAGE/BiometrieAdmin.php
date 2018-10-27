<?php
namespace OrnithoPinniBundle\Admin\ECHOUAGE;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class BiometrieAdmin extends AbstractAdmin {
  protected function configureFormFields(FormMapper $formMapper){
    $formMapper
      ->with('Biométrie', array('class' => 'col-md-12'))
          ->add('ailePliee', null, array(
                'required' => false,
                'label' => "Aile pliée (mm) *",
                'attr' => array('min' => '0')
          ))
          ->add('longueurCulmen', null, array(
                'required' => false,
                'label' => "Longueur Culmen (mm) *",
                'attr' => array('min' => '0')
          ))
          ->add('poids', null, array(
                'required' => false,
                'label' => "Poids (g) *",
                'attr' => array('min' => '0')
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

  public function validate(ErrorElement $errorElement, $object)
  {
      if($object->getPoids()==null){
          $errorElement
              ->with('poids')
                  ->addViolation("Le poids doit être renseigné")
              ->end()
          ;
      }
      if($object->getAilePliee()==null){
          $errorElement
              ->with('ailePliee')
                  ->addViolation("L'aile pliée doit être renseignée")
              ->end()
          ;
      }
      if($object->getLongueurCulmen()==null){
          $errorElement
              ->with('longueurCulmen')
                  ->addViolation("La longueur culmen doit être renseignée")
              ->end()
          ;
      }
  }
}
