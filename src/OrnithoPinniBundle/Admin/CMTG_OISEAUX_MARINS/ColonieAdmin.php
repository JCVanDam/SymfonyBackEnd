<?php
namespace OrnithoPinniBundle\Admin\CMTG_OISEAUX_MARINS;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\CoreBundle\Form\Type\DatePickerType;

class ColonieAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
        ->with('Colonie', array('class' => 'col-md-12'))
            ->add('date', DatePickerType::class, array(
                'label' => 'Date *',
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
            ->add('id', null, [
                'label' => 'Identifiant'
            ])
            ->add('espece', null, array(
                'label' => 'Espèce'
            ))
            ->add('site', null, array(
                'label' => 'Site'
            ))
            ->add('date', null, array(
                'format'=>'d/m/Y',
                'label' => 'Date'
            ))
            ->add('releve', null, array(
                'label' => 'Relevé'
            ))
            ->add('_action', null, array(
               'actions' => array(
                   'show' => array(),
                   'edit' => array(),
                   'delete' => array()
               )
            ))
        ;
    }

    public function configureShowFields(ShowMapper $showMapper){
        $showMapper
            ->with('Colonie', array('class' => 'col-md-12'))
                ->add('date', null, array(
                    'format'=>'d/m/Y',
                    'label' => 'Date'
                ))
            ->end()
            ->with('Espèce', array('class' => 'col-md-12'))
                ->add('espece', null, array(
                    'label' => 'Espèce'
                ))
            ->end()
            ->with('Localisation', array('class' => 'col-md-12'))
                ->add('site', null, array(
                    'label' => 'Site'
                ))
                ->add('releve', null, array(
                    'label' => 'Relevé'
                ))
            ->end()
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
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
        if($object->getReleve()==null){
            $errorElement
                ->with('releve')
                    ->addViolation("Le relevé GPS doit être renseigné")
                ->end()
            ;
        }
        if($object->getDate()==null){
            $errorElement
                ->with('date')
                    ->addViolation("La date doit être renseignée")
                ->end()
            ;
        }
    }

}
