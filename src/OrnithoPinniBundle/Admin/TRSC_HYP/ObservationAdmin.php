<?php
namespace OrnithoPinniBundle\Admin\TRSC_HYP;

use Sonata\AdminBundle\Admin\AbstractAdmin;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

class ObservationAdmin extends AbstractAdmin {
  protected function configureFormFields(FormMapper $formMapper){
      $list = $this->getConfigurationPool()->getContainer()->get('static_list');
      $formMapper
      ->with('Espèce', array('class' => 'col-md-12'))
          ->add('espece', null, array(
                'required' => false,
                'class' => 'OrnithoPinniBundle\Entity\General\Espece',
                'choice_label' => function($e){return $e->getNomCourant();},
                'label' => "Espèce *"
          ))
      ->end()
      ->with('Observation', array('class' => 'col-md-12'))
          ->add('saisie', 'sonata_type_model_hidden')
          ->add('distancePerpendiculaire', null, array(
                'required' => false,
                'label' => "Distance perpendiculaire *",
                'attr' => array('min' => '0')
          ))
          ->add('reponseRepasse', 'choice', array(
              'choices' => $list->getReponsesRepasse(),
              'label' => "Réponse à la repasse *",
              'placeholder' => 'Choisir...',
              'required' => false
          ))
          ->add('occupationTerrier', 'choice', array(
              'choices' => $list->getOccupationsTerrier(),
              'label' => "Occupation du terrier *",
              'placeholder' => 'Choisir...',
              'required' => false
          ))
          ->add('verifOeuf', 'choice', array(
              'choices' => $list->getVerifsOeuf(),
              'label' => "Vérification oeuf *",
              'placeholder' => 'Choisir...',
              'required' => false
          ))
          ->add('indiceOccupation01', 'choice', array(
              'choices' => $list->getIndicesOccupation(),
              'label' => "Indice d'occupation 01",
              'placeholder' => 'Choisir...',
              'required' => false
          ))
          ->add('indiceOccupation02', 'choice', array(
              'choices' => $list->getIndicesOccupation(),
              'label' => "Indice d'occupation 02",
              'placeholder' => 'Choisir...',
              'required' => false
          ))
          ->add('indiceOccupation03', 'choice', array(
              'choices' => $list->getIndicesOccupation(),
              'label' => "Indice d'occupation 03",
              'placeholder' => 'Choisir...',
              'required' => false
          ))
          ->add('vegetation', null, array(
              'label' => "Végétation",
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

  public function validate(ErrorElement $errorElement, $object)
  {
    if($object->getEspece()==null){
        $errorElement
            ->with('espece')
                ->addViolation("L'espèce doit être renseignée")
            ->end()
        ;
    }
    if($object->getDistancePerpendiculaire()==null){
        $errorElement
            ->with('distancePerpendiculaire')
                ->addViolation("La distance perpendiculaire doit être renseignée")
            ->end()
        ;
    }
    if($object->getReponseRepasse()==null){
        $errorElement
            ->with('reponseRepasse')
                ->addViolation("La réponse à la repasse doit être renseignée")
            ->end()
        ;
    }
    if($object->getOccupationTerrier()==null){
        $errorElement
            ->with('occupationTerrier')
                ->addViolation("L'occupation terrier doit être renseignée")
            ->end()
        ;
    }
    if($object->getVerifOeuf()==null){
        $errorElement
            ->with('verifOeuf')
                ->addViolation("La vérification oeuf doit être renseignée")
            ->end()
        ;
    }
  }
}
