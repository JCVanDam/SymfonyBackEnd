<?php
namespace OrnithoPinniBundle\Admin\PC;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ProtocolePermanentAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $formMapper
      ->with('Points comptage (permanent)', array('class' => 'col-md-12'))
          ->add('comptages', 'sonata_type_collection', array(
              'required' => false,
              'label' => 'Points comptage (permanent) *',
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

    public function validate(ErrorElement $errorElement, $object){
      if($object->getComptages()==null || count($object->getComptages())==0){
          $errorElement
              ->with('comptages')
                  ->addViolation("Au moins un comptage doit être renseigné")
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
        foreach($o->getComptages() as $child){
            $child->setProtocole($o);
        }
    }
}
