<?php
namespace OrnithoPinniBundle\Admin\DEMOS;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class InformationPremierPassageAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $list = $this->getConfigurationPool()->getContainer()->get('static_list');
      $formMapper
      ->with('Informations', array('class' => 'col-md-12'))
          ->add('indiceOccupation01','choice', array(
               'choices' => $list->getIndicesOccupation(),
               'label' => "Indice d'occupation 01 *",
               'placeholder' => 'Choisir...',
               'required' => false
          ))
          ->add('indiceOccupation02','choice', array(
               'choices' => $list->getIndicesOccupation(),
               'label' => "Indice d'occupation 02",
               'placeholder' => 'Choisir...',
               'required' => false
          ))
          ->add('indiceOccupation03','choice', array(
               'choices' => $list->getIndicesOccupation(),
               'label' => "Indice d'occupation 03",
               'placeholder' => 'Choisir...',
               'required' => false
          ))
          ->add('reponseRepasse','choice', array(
               'choices' => $list->getReponsesRepasse(),
               'label' => "Réponse de repasse *",
               'placeholder' => 'Choisir...',
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
      if($object->getIndiceOccupation01()==null){
          $errorElement
              ->with('indiceOccupation01')
                  ->addViolation("L'indice d'occupation 01 doit être renseignée")
              ->end()
          ;
      }
      if($object->getReponseRepasse()==null){
          $errorElement
              ->with('reponseRepasse')
                  ->addViolation("La réponse de repasse doit être renseignée")
              ->end()
          ;
      }

    }
}
