<?php
namespace OrnithoPinniBundle\Admin\SREP;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\CoreBundle\Form\Type\DateTimePickerType;

class ColonieAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
        ->with('Colonie', array('class' => 'col-md-12'))
            ->add('codeColonie', null, array(
                  'required' => false,
                  'label' => "Code *",
                  'attr' => ['readonly' => true]
            ))
            ->add('numeroColonie', null, array(
                  'required' => false,
                  'label' => "Numéro *",
                  'attr' => array('min' => '0')
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
            ->add('site', null, array(
                  'required' => false,
                  'class' => 'OrnithoPinniBundle\Entity\Localisation\Site',
                  'choice_label' => function($site){return $site;},
                  'label' => "Site *"
            ))
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

    public function validate(ErrorElement $errorElement, $object)
    {
        if($object->getNumeroColonie()==null){
            $errorElement
                ->with('numeroColonie')
                    ->addViolation("Le numéro de colonie doit être renseigné")
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
        if($object->getEspece()==null){
            $errorElement
                ->with('espece')
                    ->addViolation("L'espèce doit être renseignée")
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
    }
}
