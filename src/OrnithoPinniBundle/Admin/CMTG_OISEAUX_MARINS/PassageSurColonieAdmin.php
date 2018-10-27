<?php
namespace OrnithoPinniBundle\Admin\CMTG_OISEAUX_MARINS;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class PassageSurColonieAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
        ->with('Colonie', array('class' => 'col-md-12'))
            ->add('protocole', 'sonata_type_model_hidden')
            ->add('colonie', null, array(
                  'required' => false,
                  'class' => 'OrnithoPinniBundle\Entity\CMTG_OISEAUX_MARINS\Colonie',
                  'choice_label' => function($c){return $c;},
                  'label' => "Colonie *"
            ))
        ->end()
        ->with('Comptages', array('class' => 'col-md-12'))
            ->add('comptageEnvol', 'sonata_type_admin', array(
                  'label' => "Comptage à l'envol",
                  'required' => false
            ))
            ->add('comptageDistance', 'sonata_type_admin', array(
                  'label' => "Comptage à distance",
                  'required' => false
            ))
            ->add('remarque', null, array(
                'label' => 'Remarque',
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

    public function validate(ErrorElement $errorElement, $object)
    {
        if(($object->getComptageEnvol()->getSaisies()==null || count($object->getComptageEnvol()->getSaisies())==0) && ($object->getComptageDistance()->getSaisies()==null || count($object->getComptageDistance()->getSaisies())==0)){
            $object->setRienVu(true);
        }else{
            $object->setRienVu(false);
        }
        if($object->getColonie()==null){
            $errorElement
                ->with('colonie')
                    ->addViolation("La colonie doit être renseignée")
                ->end()
            ;
        }
    }

}
