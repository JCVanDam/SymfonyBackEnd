<?php
namespace OrnithoPinniBundle\Admin\TRSC_HYP;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class TransectGPSAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
        ->with('Transect', array('class' => 'col-md-12'))
            ->add('nom', null, array(
                  'required' => false,
                  'label' => "Nom *"
            ))
            ->add('numero', null, array(
                  'required' => false,
                  'label' => "Numéro *",
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
        $object->setTypeEspece("Hypogée");
        if($object->getNumero()==null){
            $errorElement
                ->with('numero')
                    ->addViolation("Le numéro doit être renseigné")
                ->end()
            ;
        }
        if($object->getNom()==null){
            $errorElement
                ->with('nom')
                    ->addViolation("Le nom doit être renseigné")
                ->end()
            ;
        }
    }
}
