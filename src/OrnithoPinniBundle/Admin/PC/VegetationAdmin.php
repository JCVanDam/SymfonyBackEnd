<?php
namespace OrnithoPinniBundle\Admin\PC;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class VegetationAdmin extends AbstractAdmin {
  protected function configureFormFields(FormMapper $formMapper){
    $formMapper
        ->add('description', null, array(
            'required' => false,
            'label' => 'Description *'
        ))
        ->add('remarque', null, array(
            'label' => "Remarque",
            'required' => false
        ))
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
    //Penser à la date
    if($object->getDescription()==null){
        $errorElement
            ->with('description')
                ->addViolation("Au moins une végétation doit être renseignée")
            ->end()
        ;
    }
  }
}
