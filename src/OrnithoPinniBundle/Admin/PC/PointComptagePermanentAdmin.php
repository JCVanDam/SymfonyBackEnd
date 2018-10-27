<?php
namespace OrnithoPinniBundle\Admin\PC;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PointComptagePermanentAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $formMapper
      ->with('Piquet', array('class' => 'col-md-12'))
          ->add('protocole', 'sonata_type_model_hidden')
          ->add('piquet', null, array(
              'label' => "Piquet *",
              'choice_label' => function($t){return $t->getCodePiquet().", ".$t->getSite().", ".$t->getReleve()->getLatitude().", ".$t->getReleve()->getLongitude();},
              'required' => false
          ))
      ->end()
      ->with('Végétation', array('class' => 'col-md-12'))
          ->add('vegetation', 'sonata_type_admin', array(
              'label' => "Végétation *",
              'required' => false,
              'attr' => ["style" => "padding-left:5%;"]
          ))
      ->end()
      ->with('Terriers', array('class' => 'col-md-12'))
          ->add('terriers', 'sonata_type_collection', array(
              'required' => false,
              'label' => 'Terriers',
              'by_reference' => false
          ),array(
              'edit' => 'inline',
              'inline' => 'table'
          ))
          ->add('remarque', null, array(
              'label' => "Remarque",
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

    public function validate(ErrorElement $errorElement, $object){
      if($object->getPiquet()==null){
          $errorElement
              ->with('piquet')
                  ->addViolation("Le piquet doit être renseigné")
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
        foreach($o->getTerriers() as $child){
            $child->setPointComptagePermanent($o);
        }
    }
}
