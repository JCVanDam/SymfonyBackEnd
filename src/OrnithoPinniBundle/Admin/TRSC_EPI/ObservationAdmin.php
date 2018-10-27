<?php
namespace OrnithoPinniBundle\Admin\TRSC_EPI;

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
          ->add('saisie', 'sonata_type_model_hidden')
          ->add('espece', null, array(
                'required' => false,
                'class' => 'OrnithoPinniBundle\Entity\General\Espece',
                'choice_label' => function($e){return $e->getNomCourant();},
                'label' => "Espèce *"
          ))
      ->end()
      ->with('Observation', array('class' => 'col-md-12'))
          ->add('isComptageEffectif', ChoiceFieldMaskType::class, [
              'choices' => [
                  'Groupe' => 'C1',
                  'Au nid' => 'C2'
              ],
              'map' => [
                  'C1' => ['effectifAdulteIndetermine', 'effectifAdulteMale', 'effectifAdulteFemelle'],
                  'C2' => ['indiceReproduction', 'nbOeufs', 'nbPoussins', 'sommeAdulteEffectif']
              ],
              'required' => false,
              'label' => "Type de comptage *",
              'placeholder' => 'Choisir...'
          ])
          // GROUPE - DEBUT
          ->add('effectifAdulteIndetermine', null, array(
                'required' => false,
                'label' => "Effectif d'adultes indeterminés",
                'attr' => array('min' => '0')
          ))
          ->add('effectifAdulteMale', null, array(
                'required' => false,
                'label' => "Effectif d'adultes mâles",
                'attr' => array('min' => '0')
          ))
          ->add('effectifAdulteFemelle', null, array(
                'required' => false,
                'label' => "Effectif d'adultes femelles",
                'attr' => array('min' => '0')
          ))
          // GROUPE - FIN
          // AU NID - DEBUT
          ->add('indiceReproduction', 'choice', array(
              'label' => "Indice de reproduction",
              'required' => false,
              'choices' => $list->getIndicesReproduction()
          ))
          ->add('sommeAdulteEffectif', null, array(
                'required' => false,
                'label' => "Effectif d'adultes",
                'attr' => array('min' => '0')
          ))
          ->add('nbOeufs', null, array(
                'required' => false,
                'label' => "Nombre d'oeufs",
                'attr' => array('min' => '0')
          ))
          ->add('nbPoussins', null, array(
                'required' => false,
                'label' => "Nombre de poussins",
                'attr' => array('min' => '0')
          ))
          // AU NID - FIN
          ->add('distancePerpendiculaire', null, array(
                'required' => false,
                'label' => "Distance perpendiculaire (D)",
                'attr' => array('min' => '0')
          ))
          ->add('distanceAngulaire', null, array(
                'required' => false,
                'label' => "Distance angulaire (d)",
                'attr' => array('min' => '0')
          ))
          ->add('angleMagnetique', null, array(
                'required' => false,
                'label' => "Angle magnétique (a1)",
                'attr' => array('min' => '0')
          ))
          ->add('angleTransect', null, array(
                'required' => false,
                'label' => "Angle transect (a2)",
                'attr' => array('min' => '0')
          ))
          ->add('activiteComportement', 'choice', array(
              'label' => "Activité et comportement",
              'required' => false,
              'choices' => $list->getActivitesEtComportements()
          ))
          ->add('vegetation', null, array(
              'label' => "Végétation",
              'required' => false
          ))
          ->add('remarques', null, array(
              'label' => "Remarques",
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
      if($object->getIsComptageEffectif()==null){
          $errorElement
              ->with('isComptageEffectif')
                  ->addViolation("Ce champs doit être renseigné")
              ->end()
          ;
      }
      if($object->getEspece()==null){
          $errorElement
              ->with('espece')
                  ->addViolation("L'espèce doit être renseignée")
              ->end()
          ;
      }
      if($object->getIsComptageEffectif()=="C1"){
          $somme = 0;
          if($object->getEffectifAdulteIndetermine()!=null){
              $somme += $object->getEffectifAdulteIndetermine();
          }
          if($object->getEffectifAdulteMale()!=null){
              $somme += $object->getEffectifAdulteMale();
          }
          if($object->getEffectifAdulteFemelle()!=null){
              $somme += $object->getEffectifAdulteFemelle();
          }
          if($somme==0){
            $errorElement
                ->with('effectifAdulteIndetermine')
                    ->addViolation("La somme de tous les effectifs doit être supérieure à zéro")
                ->end()
            ;
            $errorElement
                ->with('effectifAdulteMale')
                    ->addViolation("La somme de tous les effectifs doit être supérieure à zéro")
                ->end()
            ;
            $errorElement
                ->with('effectifAdulteFemelle')
                    ->addViolation("La somme de tous les effectifs doit être supérieure à zéro")
                ->end()
            ;
          }else{
              $object->setSommeAdulteEffectif($object->getEffectifAdulteFemelle() + $object->getEffectifAdulteIndetermine() + $object->getEffectifAdulteMale());
          }
      }else if($object->getIsComptageEffectif()=="C2"){
          $somme = 0;
          if($object->getSommeAdulteEffectif()!=null){
              $somme += $object->getSommeAdulteEffectif();
          }
          if($object->getNbOeufs()!=null){
              $somme += $object->getNbOeufs();
          }
          if($object->getNbPoussins()!=null){
              $somme += $object->getNbPoussins();
          }
          if($somme==0){
            $errorElement
                ->with('sommeAdulteEffectif')
                    ->addViolation("La somme de tous les effectifs doit être supérieure à zéro")
                ->end()
            ;
            $errorElement
                ->with('nbOeufs')
                    ->addViolation("La somme de tous les effectifs doit être supérieure à zéro")
                ->end()
            ;
            $errorElement
                ->with('nbPoussins')
                    ->addViolation("La somme de tous les effectifs doit être supérieure à zéro")
                ->end()
            ;
          }

      }
      if($object->getDistancePerpendiculaire()==null){
        if($object->getDistanceAngulaire()==null){
          $errorElement
              ->with('distanceAngulaire')
                  ->addViolation("Si la distance perpendiculaire est nulle, merci de renseigner ce champs")
              ->end()
          ;
        }
        if($object->getAngleTransect()==null){
          $errorElement
              ->with('angleTransect')
                  ->addViolation("Si la distance perpendiculaire est nulle, merci de renseigner ce champs")
              ->end()
          ;
        }
        if($object->getAngleMagnetique()==null){
          $errorElement
              ->with('angleMagnetique')
                  ->addViolation("Si la distance perpendiculaire est nulle, merci de renseigner ce champs")
              ->end()
          ;
        }
      }
    }
}
