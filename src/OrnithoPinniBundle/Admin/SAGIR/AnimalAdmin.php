<?php
namespace OrnithoPinniBundle\Admin\SAGIR;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class AnimalAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
            ->add('decouverte', 'sonata_type_model_hidden')
            ->add('statut','choice', array(
                 'choices' => ["Vivant"=>"vivant", "Mort"=>"mort"],
                 'label' => "Statut *",
                 'required' => false,
                 'placeholder' => "Choisir..."
            ))
            ->add('age', 'choice', array(
                 'choices' => $list->getSagirAges(),
                 'label' => "Âge *",
                 'required' => false,
                 'placeholder' => "Choisir..."
            ))
            ->add('sexe', 'choice', array(
                 'choices' => $list->getSexes(),
                 'label' => "Sexe *",
                 'required' => false,
                 'placeholder' => "Choisir..."
            ))
            ->add('echantillonCollecte', null, array(
                 'label' => "Avez-vous collecté un échantillon ?",
                 'required' => false,
            ))
            ->add('precision', null, array(
                 'label' => "Si oui, précisez...",
                 'required' => false,
            ))
        ;
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        //A FAIRE
    }

    protected function configureListFields(ListMapper $listMapper){
        unset($this->listModes['mosaic']);
        $listMapper
            ->add('code', null, array())
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
        if($object->getAge()==null){
            $errorElement
                ->with('age')
                    ->addViolation("L'âge doit être renseigné")
                ->end()
            ;
        }
        if($object->getStatut()==null){
            $errorElement
                ->with('statut')
                    ->addViolation("Le statut doit être renseigné")
                ->end()
            ;
        }
        if($object->getSexe()==null){
            $errorElement
                ->with('sexe')
                    ->addViolation("Le sexe doit être renseigné")
                ->end()
            ;
        }
    }
}
