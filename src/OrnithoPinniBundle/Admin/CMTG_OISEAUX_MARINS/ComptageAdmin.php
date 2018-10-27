<?php
namespace OrnithoPinniBundle\Admin\CMTG_OISEAUX_MARINS;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ComptageAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
        ->with('Saisies', array('class' => 'col-md-12'))
            ->add('isEmpty', null, array(
                'required' => false,
                'label' => 'Aucune saisie ? *'
            ))
            ->add('saisies', 'sonata_type_collection', array(
                'required' => false,
                'label' => 'Saisies *',
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
        if($object->getIsEmpty()==true){
            //pas de saisie à renseigner
        }else if($object->getSaisies()==null || count($object->getSaisies())==0){
          //gérer si pas de comptage !
            $errorElement
                ->with('saisies')
                    ->addViolation("Au moins une saisie doit être renseignée")
                ->end()
            ;
        }else{
            $tab = [];
            foreach($object->getSaisies() as $s){
                if((array_key_exists($s->getTypeEffectif(),$tab))){
                    $tab[$s->getTypeEffectif()]++;
                }else{
                    $tab[$s->getTypeEffectif()] = 1;
                }
            }
            foreach($tab as $key => $value){
                if($value>1){
                  $errorElement
                      ->with('saisies')
                          ->addViolation("Vous ne pouvez pas avoir plusieurs saisies pour le type effectif '".$key."' dans un même comptage")
                      ->end()
                  ;
                }
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
        foreach($o->getSaisies() as $child){
            $child->setComptage($o);
        }
    }

}
