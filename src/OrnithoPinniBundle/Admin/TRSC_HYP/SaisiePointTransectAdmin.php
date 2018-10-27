<?php
namespace OrnithoPinniBundle\Admin\TRSC_HYP;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

class SaisiePointTransectAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
        ->with('Localisation', array('class' => 'col-md-12'))
            ->add('releve', 'sonata_type_admin', array(
                'label' => "Relevé *",
                'required' => false
            ))
        ->end()
        ->with('Observations', array('class' => 'col-md-12'))
            ->add('observations', 'sonata_type_collection', array(
                'required' => false,
                'label' => "Observations *",
                'by_reference' => false
            ),array(
                'edit' => 'inline',
                'inline' => 'table'
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
        if($object->getReleve()==null){
            $errorElement
                ->with('releve')
                    ->addViolation("Le relevé doit être renseigné")
                ->end()
            ;
        }
        if($object->getObservations()==null || count($object->getObservations())==0){
            $errorElement
                ->with('observations')
                    ->addViolation("Au moins une observation doit être renseignée")
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
        foreach($o->getObservations() as $child){
            $child->setSaisie($o);
        }
    }
}
