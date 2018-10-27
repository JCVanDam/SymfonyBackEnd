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

use HFIBundle\Form\Type\LinkType;
use HFIBundle\Form\Type\LinkParentType;

class FicheTerrainAdmin extends AbstractAdmin
{
    protected $datagridValues = [
      '_sort_order' => 'DESC',
    ];

    protected function configureFormFields(FormMapper $formMapper)
    {
      $formMapper
      ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
      $datagridMapper
      ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->add('observation', null,
          [
            'label' => 'Numéro observation',
            'associated_property' => 'numeroObservation'
          ])
        ->add('statutFicheTerrain', null, ['label' => 'Statut fiche terrain'])
        ->add('longueur', null, ['label' => 'Longueur'])
        ->add('largeur', null, ['label' => 'Largeur'])
        ->add('typeMilieu', null, ['label' => 'Type milieu'])
        ->add('habitat', null, ['label' => 'habitat'])
        ->add('commentaire', null, ['label' => 'Commentaire'])
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
      ->with('Description', ['class' => 'col-md-4'])
        ->add('statutFicheTerrain', null, ['label' => 'Statut fiche terrain'])
      ->end()
      ->with('Surface', ['class' => 'col-md-4'])
        ->add('longueur', null, ['label' => 'Longueur'])
        ->add('largeur', null, ['label' => 'Largeur'])
      ->end()
      ->with('Milieu', ['class' => 'col-md-4'])
        ->add('typeMilieu', null, ['label' => 'Type milieu'])
        ->add('milieuAutre', null, ['label' => 'Milieu autre'])
      ->end()
      ->with('Erosion', ['class' => 'col-md-4'])
        ->add('erosionAutre', null, ['label' => 'Erosion autre'])
      ->end()
      ->with('Habitat', ['class' => 'col-md-4'])
        ->add('habitat', null, ['label' => 'habitat'])
      ->end()
      ->with('Contexte', ['class' => 'col-md-4'])
        ->add('substrat', null, ['label' => 'Substrat'])
        ->add('humidite', null, ['label' => 'Humidité'])
      ->end()
      ->with('Topographie', ['class' => 'col-md-4'])
        ->add('topographie', null, ['label' => 'Topographie'])
        ->add('topoAutre', null, ['label' => 'Topographie autre'])
        ->add('pente', null, ['label' => 'Pente'])
        ->add('conditionExposition', null, ['label' => 'Condition exposition'])
        ->add('orientation', null, ['label' => 'Orientation'])
      ->end()
      ->with('Recouvrement (en %, peut dépasser 100%) ', ['class' => 'col-md-8'])
        ->add('recBlocs', null, ['label' => 'Rec blocs'])
        ->add('recCailloux', null, ['label' => 'Rec cailloux'])
        ->add('recSols', null, ['label' => 'Rec sols'])
        ->add('recGraviers', null, ['label' => 'Rec graviers'])
        ->add('recStrateBryoLichenique', null, ['label' => 'Rec strate bryoLichenique'])
        ->add('recStrateHerbacee', null, ['label' => 'Rec strate herbacee'])
        ->add('recStrateArbustive', null, ['label' => 'Rec strate arbustive'])
      ->end()
      // ->with('Observations',
      //   [
      //     'class'       => 'col-md-4',
      //     'box_class'   => 'box box-solid',
      //   ])
        // ->add('observations', null, array(
          // 'label' => "Observations",
          // 'template' => 'HFIBundle:Default:index.html.twig'
        // ))
      // ->end()
      ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
      // dump($object);
      // die;
    }

    public function postPersist($object)
    {
      // check protocole and protocle Autres both can't be filled
    }

    public function preUpdate($object)
    {
      // check protocole and protocle Autres both can't be filled
    }

}
