<?php

namespace HFIBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\AdminType;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\CoreBundle\Form\Type\DateTimePickerType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EradicationAdmin extends AbstractAdmin
{
    protected $datagridValues = [
      '_sort_order' => 'DESC',
    ];

    protected function configureFormFields(FormMapper $formMapper)
    {
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
        ->add('typeObservation', null, ['label' => 'Type observation'])
        ->add('phenologie', null, ['label' => 'Phénologie(stade le plus avancé)'])
        ->add('presenceGraine', null, ['label' => 'Présence de graines'])
        ->add('surfaceArchive', null, ['label' => 'Surface archivée'])
        ->add('calculeSurface', null, ['label' => 'Mode de calcule de surface'])
        ->add('longueurReelleTraite', null, ['label' => 'Longueur(en mètres)'])
        ->add('largeurReelleTraite', null, ['label' => 'Largeur(en mètres)'])
        // ->add('surfaceEstimation', null, ['label' => 'Surface estimé'])
        ->add('nombrePiedApproximatif', null, ['label' => 'Nombre de pieds aproximatif'])
        ->add('nombrePiedExact',null, ['label' => 'Nombre pied exact'])
        ->add('typeColonisation', null, ['label' => 'Type de colonisation'])
        ->add('nbrPatch', null, ['label' => 'Nombre de patch'])
        ->add('hautMoy', null, ['label' => 'hauteur moyenne(cm)'])
        ->add('hautMax', null, ['label' => 'hauteur max(cm)'])
        ->add('arrachage', null, ['label' => 'Arrachage'])
        ->add('etatBachage', null, ['label' => 'Bachage'])
        ->add('coupe', null, ['label' => 'Coupe'])
        ->add('traitementThermique', null, ['label' => 'Traitement thermique'])
        ->add('epandageSel', null, ['label' => 'Epandage de sel'])
        ->add('produitUtilise', null, ['label' => 'Traitement chimique'])
        ->add('dilution', null, ['label' => 'Dilution(en %)'])
        ->add('miseEnHerbier', null, ['label' => 'Mise en herbier'])
        ->add('surfaceArchiveTraitee', null, ['label' => 'Surface traitée archivée'])
        ->add('surfaceTraitement', null, ['label' => 'Surface traitée'])
        ->add('longueurTraite', null, ['label' => 'Longueur(en mètres)'])
        ->add('largeurTraite', null, ['label' => 'Largeur(en mètres)'])
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->add('observation', null,
          [
            'label' => 'Id observation',
            'associated_property' => 'id'
          ])
        // ->add('observation', null,
        //   [
        //     'label' => 'Numéro observation',
        //     'associated_property' => 'numeroObservation'
        //   ])
        ->add('typeObservation', null, ['label' => 'Type observation'])
        ->add('phenologie', null, ['label' => 'Phénologie'])
        ->add('typeColonisation', null, ['label' => 'Type colonisation'])
        ->add('hautMoy', null, ['label' => 'Hauteur moyenne'])
        ->add('eradicationNonEfficace', null, ['label' => 'Eradication non efficace'])
        ->add('_action', null, [
          'actions' => [
            'show' => [],
          ]
        ])
      ;
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
      $showMapper
        ->with('Espece', ['class' => 'col-md-4'])
        ->end()
        ->with('Observation', ['class' => 'col-md-4'])
          ->add('typeObservation', null, ['label' => 'Type observation'])
        ->end()
        ->with('Information population ', ['class' => 'col-md-4'])
          ->add('phenologie', null, ['label' => 'Phénologie'])
          ->add('presenceGraine', null, ['label' => 'Présence graine'])
        ->end()
        ->with('Surface', ['class' => 'col-md-4'])
          ->add('calculeSurface', null, ['label' => 'Calcule surface'])
          ->add('surfaceEstimee', null, ['label' => 'Surface estimée'])
          ->add('largeurReelleTraite', null, ['label' => 'Largeur traitée'])
          ->add('longueurReelleTraite', null, ['label' => 'Longueur traitée'])
          ->add('nombrePiedApproximatif', null, ['label' => 'Nombre pied approximatif'])
          ->add('nombrePiedExact', null, ['label' => 'Nombre pied exact'])
        ->end()
        ->with('Colonisation', ['class' => 'col-md-4'])
          ->add('typeColonisation', null, ['label' => 'Type colonisation'])
          ->add('nbrPatch', null, ['label' => 'Nombre patch'])
        ->end()
        ->with('Hauteur', ['class' => 'col-md-4'])
          ->add('hautMoy', null, ['label' => 'Hauteur moyenne'])
          ->add('hautMax', null, ['label' => 'Hauteur Maximum'])
        ->end()
        ->with('Méthode mécanique', ['class' => 'col-md-4'])
          ->add('arrachage', null, ['label' => 'Arrachage'])
          ->add('etatBachage', null, ['label' => 'Etat du bachage'])
          ->add('coupe', null, ['label' => 'Coupe'])
          ->add('traitementThermique', null, ['label' => 'Traitement thermique'])
        ->end()
        ->with('Méthode chimique', ['class' => 'col-md-4'])
          ->add('epandageSel', null, ['label' => 'Epandage de sel'])
          ->add('produitUtilise', null, ['label' => 'Produits utilisés'])
          ->add('dilution', null, ['label' => 'Dilution'])
        ->end()
        ->with('Herbier', ['class' => 'col-md-4'])
          ->add('miseEnHerbier', null, ['label' => 'Mise en herbier'])
        ->end()
        ->with('Surface traité', ['class' => 'col-md-4'])
          ->add('surfaceTraitement', null, ['label' => 'Surface de traitement'])
          ->add('longueurTraite', null, ['label' => 'LongueurTraite'])
          ->add('largeurTraite', null, ['label' => 'LargeurTraite'])
        ->end()
      ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
    }

    public function preUpdate($object)
    {
    }

    public function postUpdate($object)
    {
    }

    public function prePersist($object)
    {
    }

    public function postPersist($object)
    {
    }
}
