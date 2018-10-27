<?php
namespace OrnithoPinniBundle\Admin\CMTG_PINNI;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ProtocoleAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $list = $this->getConfigurationPool()->getContainer()->get('static_list');
        $formMapper
        ->with('Général', array('class' => 'col-md-12'))
            ->add('modeDeSaisie','choice', array(
                 'choices' => $list->getLieuxComptages(),
                 'label' => "Type de prospection",
                 'required' => false,
                 'placeholder' => 'Choisir...'
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
        ->with('Localisation de début', array('class' => 'col-md-12'))
            ->add('debut', 'sonata_type_admin', array(
                'label' => 'Début *',
                'required' => false
            ))
        ->end()
        ->with('Localisation de fin', array('class' => 'col-md-12'))
            ->add('fin', 'sonata_type_admin', array(
                'label' => 'Fin *',
                'required' => false
            ))
        ->end()
        ->with('Comptages', array('class' => 'col-md-12'))
            ->add('comptages', 'sonata_type_collection', array(
                'required' => false,
                'by_reference' => false
            ),array(
                'edit' => 'inline',
                'inline' => 'table'
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
        $object->setModeTraceEnregistre(false);
        if($object->getDebut()==null){
            $errorElement
                ->with('debut')
                    ->addViolation("La localisation de départ doit être renseignée")
                ->end()
            ;
        }
        if($object->getFin()==null){
            $errorElement
                ->with('fin')
                    ->addViolation("La localisation de fin doit être renseignée")
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
        $tab = [];
        foreach($object->getComptages() as $c){
            if((array_key_exists($c->getTypeEffectif(),$tab))){
                $tab[$c->getTypeEffectif()]++;
            }else{
                $tab[$c->getTypeEffectif()] = 1;
            }
        }
        foreach($tab as $key => $value){
            if($value>1){
              $errorElement
                  ->with('comptages')
                      ->addViolation("Vous ne pouvez pas avoir plusieurs comptages pour le type effectif '".$key."' dans un même protocole")
                  ->end()
              ;
            }
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
        foreach($o->getComptages() as $child){
            $child->setProtocole($o);
        }
    }

}
