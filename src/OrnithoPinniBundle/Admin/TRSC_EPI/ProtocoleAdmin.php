<?php
namespace OrnithoPinniBundle\Admin\TRSC_EPI;

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
        ->with('Transect', array('class' => 'col-md-12'))
            ->add('transect', null, array(
                  'required' => false,
                  'label' => "Transect *"
            ))
        ->end()
        ->with('Protocole', array('class' => 'col-md-12'))
            ->add('directionSuivie', 'choice', array(
                  'choices' => $list->getDirectionsSuivies(),
                  'required' => false,
                  'label' => "Direction suivie *"
            ))
            ->add('problemeTerrain', null, array(
                  'required' => false,
                  'label' => "(cochez la case si pas de longueur mesurée avec l'odomètre (problème terrain))"
            ))
            ->add('longueur', null, array(
                  'required' => false,
                  'label' => "Longueur"
            ))
        ->end()
        ->with('Observateur', array('class' => 'col-md-12'))
            ->add('observateur', null, array(
                  'required' => false,
                  'label' => "Observateur *"
            ))
        ->end()
        ->with('Saisies', array('class' => 'col-md-12'))
            ->add('pasDeSaisie', null, array(
                  'required' => false,
                  'label' => "Aucune saisie à renseigner sur ce transect ?",
                  'by_reference' => false
            ))
            ->add('saisies', 'sonata_type_collection', array(
                'required' => false,
                'label' => 'Saisies'
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
      if($object->getTransect()==null){
          $errorElement
              ->with('transect')
                  ->addViolation("Le transect doit être renseigné")
              ->end()
          ;
      }
      if($object->getDirectionSuivie()==null){
          $errorElement
              ->with('directionSuivie')
                  ->addViolation("La direction suivie doit être renseignée")
              ->end()
          ;
      }
      if($object->getProblemeTerrain()==null || $object->getProblemeTerrain()==false){
        if($object->getLongueur()==null){
          $errorElement
              ->with('longueur')
                  ->addViolation("Si vous n'avez pas eu de problème sur le terrain, vous devez saisir la longueur")
              ->end()
          ;
        }
      }
      if($object->getObservateur()==null){
        $errorElement
            ->with('observateur')
                ->addViolation("L'observateur doit être renseigné")
            ->end()
        ;
      }
      if($object->getPasDeSaisie()==null || $object->getPasDeSaisie()==false){
        if($object->getSaisies()==null || count($object->getSaisies())==0){
            $errorElement
                ->with('saisies')
                    ->addViolation("Au moins une saisie doit être renseignée")
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
