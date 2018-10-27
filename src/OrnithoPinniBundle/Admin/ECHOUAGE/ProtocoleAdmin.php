<?php
namespace OrnithoPinniBundle\Admin\ECHOUAGE;

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
        ->with('Protocole', array('class' => 'col-md-12'))
            ->add('childType', ChoiceFieldMaskType::class, [
                'choices' => [
                    'Protocole surveillance' => 'C1',
                    'Données opportunistes' => 'C2'
                ],
                'map' => [
                    'C1' => ['ECHOUAGE_protocole_en_tournee'],
                    'C2' => ['ECHOUAGE_protocole_opportuniste']
                ],
                'required' => false,
                'label' => "Type *",
                'placeholder' => 'Choisir...'
            ])
            ->add('ECHOUAGE_protocole_en_tournee', 'sonata_type_admin', array(
                'label' => 'Protocole surveillance *',
                'required' => false,
                'attr' => array('style' => 'padding-left:5%;')
            ))
            ->add('ECHOUAGE_protocole_opportuniste', 'sonata_type_admin', array(
                'label' => 'Données opportunistes *',
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

    public function validate(ErrorElement $errorElement, $object)
    {
      $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getEntityManager('ornitho_pinni');
      if($object->getChildType()==null){
          $errorElement
              ->with('childType')
                  ->addViolation("Le type de protocole doit être renseigné")
              ->end()
          ;
      }
      if($object->getChildType() == 'C1'){
          if($object->getECHOUAGEProtocoleOpportuniste()!=null){
              $em->remove($object->getECHOUAGEProtocoleOpportuniste());
              $object->setECHOUAGEProtocoleOpportuniste(null);
          }
          if($object->getECHOUAGEProtocoleEnTournee()==null){
              $errorElement
                  ->with('ECHOUAGE_protocole_en_tournee')
                      ->addViolation("Le protocole choisi doit être renseigné")
                  ->end()
              ;
          }
      }
      if($object->getChildType() == 'C2'){
          if($object->getECHOUAGEProtocoleEnTournee()!=null){
              $em->remove($object->getECHOUAGEProtocoleEnTournee());
              $object->setECHOUAGEProtocoleEnTournee(null);
          }
          if($object->getECHOUAGEProtocoleOpportuniste()==null){
              $errorElement
                  ->with('ECHOUAGE_protocole_opportuniste')
                      ->addViolation("Le protocole choisi doit être renseigné")
                  ->end()
              ;
          }
      }
    }

}
