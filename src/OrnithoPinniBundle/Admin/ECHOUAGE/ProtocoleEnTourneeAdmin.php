<?php
namespace OrnithoPinniBundle\Admin\ECHOUAGE;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class ProtocoleEnTourneeAdmin extends AbstractAdmin {
  protected function configureFormFields(FormMapper $formMapper){
    $formMapper
    ->with('Tournée', array('class' => 'col-md-12'))
        ->add('heureDeb', null, array(
            'label' => 'Heure de début *',
            'required' => false
        ))
        ->add('heureFin', null, array(
            'label' => 'Heure de fin *',
            'required' => false
        ))
        ->add('description', null, array(
            'label' => 'Description',
            'required' => false
        ))
    ->end()
    ->with('Découvertes', array('class' => 'col-md-12'))
        ->add('decouvertes', 'sonata_type_collection', array(
            'required' => false,
            'label' => 'Découvertes *',
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
    if($object->getDecouvertes()==null || count($object->getDecouvertes())<1){
        $errorElement
            ->with('decouvertes')
                ->addViolation("Au moins une découverte doit être renseignée")
            ->end()
        ;
    }
    if($object->getHeureDeb()==null){
        $errorElement
            ->with('heureDeb')
                ->addViolation("L'heure de début doit être renseignée")
            ->end()
        ;
    }
    if($object->getHeureFin()==null){
        $errorElement
            ->with('heureFin')
                ->addViolation("L'heure de fin doit être renseignée")
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
        foreach($o->getDecouvertes() as $child){
            $child->setProtocole($o);
        }
    }
}
