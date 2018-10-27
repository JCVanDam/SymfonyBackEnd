<?php
namespace OrnithoPinniBundle\Admin\DEMOS;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

use Sonata\CoreBundle\Form\Type\DatePickerType;

class PassageSurTerrierAdmin extends AbstractAdmin {
    protected function configureFormFields(FormMapper $formMapper){
      $list = $this->getConfigurationPool()->getContainer()->get('static_list');
      $formMapper
      ->with('Passage', array('class' => 'col-md-12'))
          ->add('protocole', 'sonata_type_model_hidden')
          ->add('terrier', null, array(
              'label' => "Terrier *",
              'required' => false
          ))
      ->end()
      ->with('Passage', array('class' => 'col-md-12'))
          ->add('presence','choice', array(
               'choices' => $list->getPresences(),
               'label' => "Présence *",
               'placeholder' => 'Choisir...',
               'required' => false
          ))
      ;
      if($this->getSubject() ==null || $this->getSubject()->getId()==null) {
          //DEFAULT
          $formMapper
          ->add('premierPassage', ChoiceFieldMaskType::class, [
              'choices' => [
                  'Non' => 'C1',
                  'Oui' => 'C2'
              ],
              'map' => [
                  'C1' => [],
                  'C2' => ['informations']
              ],
              'data' => 'C2',
              'required' => false,
              'label' => "Est-ce le premier passage de la saison ? *",
              'placeholder' => 'Choisir...',
          ]);
      }else{
          //RECUP BDD
          $formMapper
          ->add('premierPassage', ChoiceFieldMaskType::class, [
              'choices' => [
                  'Non' => 'C1',
                  'Oui' => 'C2'
              ],
              'map' => [
                  'C1' => [],
                  'C2' => ['informations']
              ],
              'required' => false,
              'label' => "Est-ce le premier passage de la saison ? *",
              'placeholder' => 'Choisir...',
          ]);
      }
      $formMapper
          ->add('informations', 'sonata_type_admin', array(
              'label' => 'Informations supplémentaires *',
              'required' => false
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
      if($object->getPresence()==null){
          $errorElement
              ->with('presence')
                  ->addViolation("La présence doit être renseignée")
              ->end()
          ;
      }
      if($object->getPremierPassage()==null){
          $errorElement
              ->with('premierPassage')
                  ->addViolation("Le premier passage doit être renseigné")
              ->end()
          ;
      }else if($object->getPremierPassage()=="C1"){
          //NON
          $object->setInformations(null);
      }else if($object->getPremierPassage()=="C2"){
          //OUI
          if($object->getInformations()==null){
              $errorElement
                  ->with('informations')
                      ->addViolation("Les informations supplémentaires doivent être renseignées")
                  ->end()
              ;
          }
      }
      if($object->getTerrier()==null){
          $errorElement
              ->with('terrier')
                  ->addViolation("Le terrier doit être renseigné")
              ->end()
          ;
      }
    }
}
