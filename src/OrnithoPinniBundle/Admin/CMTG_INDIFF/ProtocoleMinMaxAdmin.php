<?php
namespace OrnithoPinniBundle\Admin\CMTG_INDIFF;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ProtocoleMinMaxAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper
            ->add('comptages', 'sonata_type_collection', array(
                'required' => false,
                'label' => "Comptages *",
                'by_reference' => false
            ),array(
                'edit' => 'inline',
                'inline' => 'table'
            ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
      if($object->getComptages()==null || count($object->getComptages())==0){
          $errorElement
              ->with('comptages')
                  ->addViolation("Au moins un comptage doit être renseigné")
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
