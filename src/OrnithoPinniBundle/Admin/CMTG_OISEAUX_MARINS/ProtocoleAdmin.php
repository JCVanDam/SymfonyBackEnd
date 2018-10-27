<?php
namespace OrnithoPinniBundle\Admin\CMTG_OISEAUX_MARINS;

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
        ->with('Protocole', array('class' => 'col-md-12'))
            ->add('saison', 'choice', array(
                'choices' => $list->getSaisons(),
                'label' => "Saison *",
                'placeholder' => 'Choisir...'
            ))
        ->end()
        ->with('Passages sur colonie', array('class' => 'col-md-12'))
            ->add('saisies', 'sonata_type_collection', array(
                'required' => false,
                'label' => 'Saisies sur colonie *',
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
        if($object->getSaisies()==null || count($object->getSaisies())==0){
            $errorElement
                ->with('saisies')
                    ->addViolation("Au moins un passage sur colonie doit être renseigné")
                ->end()
            ;
        }
        if($object->getSaison()==null){
            $errorElement
                ->with('saison')
                    ->addViolation("La saison doit être renseignée")
                ->end()
            ;
        }
        $tab = [];
        foreach($object->getSaisies() as $p){
          if($p->getColonie()!=null){
            if((array_key_exists("Colonie n°".$p->getColonie()->getId(),$tab))){
                $tab["Colonie n°".$p->getColonie()->getId()]++;
            }else{
                $tab["Colonie n°".$p->getColonie()->getId()] = 1;
            }
          }else{
            $errorElement
                ->with('passages')
                    ->addViolation("Pour chaque passage, la colonie doit être renseignée")
                ->end()
            ;
          }
        }
        foreach($tab as $key => $value){
            if($value>1){
              $errorElement
                  ->with('saisies')
                      ->addViolation("Vous ne pouvez pas avoir plusieurs saisies pour une même colonie ('".$key."') dans une même manip")
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
        foreach($o->getSaisies() as $child){
            $child->setProtocole($o);
        }
    }

}
