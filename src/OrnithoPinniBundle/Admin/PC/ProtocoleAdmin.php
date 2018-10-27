<?php
namespace OrnithoPinniBundle\Admin\PC;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

class ProtocoleAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $formMapper
      ->with('Spécialisation', array('class' => 'col-md-12'))
          ->add('childType', ChoiceFieldMaskType::class, [
              'choices' => [
                  'Permanent' => 'C1',
                  'Transect' => 'C2'
              ],
              'map' => [
                  'C1' => ['PC_protocole_permanent'],
                  'C2' => ['PC_protocole_transect']
              ],
              'required' => false,
              'label' => "Type de comptage *",
              'placeholder' => 'Choisir...'
          ])
          ->add('PC_protocole_permanent', 'sonata_type_admin', array(
              'label' => 'Permanent *',
              'required' => false,
              'attr' => array('style' => 'padding-left:5%;')
          ))
          ->add('PC_protocole_transect', 'sonata_type_admin', array(
              'label' => 'Transect *',
              'required' => false,
              'attr' => array('style' => 'padding-left:5%;')
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
      $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getEntityManager('ornitho_pinni');
      if($object->getChildType()==null){
          $errorElement
              ->with('childType')
                  ->addViolation("Le type de protocole doit être renseigné")
              ->end()
          ;
      }
      if($object->getChildType() == 'C1'){
          if($object->getPCProtocoleTransect()!=null){
              $em->remove($object->getPCProtocoleTransect());
              $object->setPCProtocoleTransect(null);
          }
          if($object->getPCProtocolePermanent()==null){
              $errorElement
                  ->with('PC_protocole_permanent')
                      ->addViolation("Le protocole choisi doit être renseigné")
                  ->end()
              ;
          }
      }
      if($object->getChildType() == 'C2'){
          if($object->getPCProtocolePermanent()!=null){
              $em->remove($object->getPCProtocolePermanent());
              $object->setPCProtocolePermanent(null);
          }
          if($object->getPCProtocoleTransect()==null){
              $errorElement
                  ->with('PC_protocole_transect')
                      ->addViolation("Le protocole choisi doit être renseigné")
                  ->end()
              ;
          }
      }
    }

}
