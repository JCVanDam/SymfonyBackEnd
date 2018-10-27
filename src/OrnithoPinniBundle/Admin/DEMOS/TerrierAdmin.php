<?php
namespace OrnithoPinniBundle\Admin\DEMOS;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\CoreBundle\Form\Type\DatePickerType;

class TerrierAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $formMapper
      ->with('Terrier', array('class' => 'col-md-12'))
          ->add('numeroPiquet', null, array(
              'label' => 'Numéro *',
              'required' => false
          ))
          ->add('codePiquet', null, array(
              'label' => 'Code *',
              'required' => false
          ))
          ->add('dateDernierPassage', DatePickerType::class, array(
              'label' => 'Date',
              'format'=>'dd/MM/yyyy',
              'required' => false
          ))
      ->end()
      ->with('Espèce', array('class' => 'col-md-12'))
          ->add('espece', null, array(
                'required' => false,
                'class' => 'OrnithoPinniBundle\Entity\General\Espece',
                'choice_label' => function($e){return $e->getNomCourant();},
                'label' => "Espèce *"
          ))
      ->end()
      ->with('Localisation', array('class' => 'col-md-12'))
          ->add('releve', 'sonata_type_admin', array(
              'label' => 'Relevé GPS *',
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
        if($object->getNumeroPiquet()==null){
            $errorElement
                ->with('numeroPiquet')
                    ->addViolation("Le numéro de piquet doit être renseigné")
                ->end()
            ;
        }
        if($object->getCodePiquet()==null){
            $errorElement
                ->with('codePiquet')
                    ->addViolation("Le code de piquet doit être renseigné")
                ->end()
            ;
        }
        if($object->getEspece()==null){
            $errorElement
                ->with('espece')
                    ->addViolation("L'espèce doit être renseignée")
                ->end()
            ;
        }
        if($object->getReleve()==null){
            $errorElement
                ->with('releve')
                    ->addViolation("Le relevé GPS doit être renseigné")
                ->end()
            ;
        }
    }
}
