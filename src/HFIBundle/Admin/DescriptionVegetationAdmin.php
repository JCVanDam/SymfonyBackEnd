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

class DescriptionVegetationAdmin extends AbstractAdmin
{
    protected $datagridValues = [
      '_sort_order' => 'DESC',
    ];

    protected function configureFormFields(FormMapper $formMapper)
    {
        $list = $this
          ->getConfigurationPool()
          ->getContainer()
          ->get('usefull.hfi.static_list');
        $descriptionVegetation = [];
        if ($this->getSubject() && $this->getSubject()->getId()){
          $descriptionVegetation = $this
            ->getConfigurationPool()
            ->getContainer()
            ->get('doctrine')
            ->getEntityManager('hfi')
            ->getRepository('HFIBundle:DescriptionVegetation', 'hfi')
            ->getDescriptionVegetation($this->getSubject()->getId());
          $descriptionVegetation['miseEnPot'] = ($descriptionVegetation['miseEnPot'] == false) ? "false" : "true" ;
          $descriptionVegetation['miseEnHerbier'] = ($descriptionVegetation['miseEnHerbier'] == false) ? "false" : "true" ;
        } else {
          $descriptionVegetation['miseEnPot'] =  "false";
          $descriptionVegetation['miseEnHerbier'] =  "false";
        }
        $formMapper
          ->add('nomScientifique', EntityType::class,
            [
              'class' => 'HFIBundle\Entity\SystematiqueFlore',
              'choice_label' => function($e){return $e->concate();},
              'label' => 'Nom scientifique',
              'required' => false
            ])
          ->add('rec', 'choice',
            [
              'label' => 'Recouvrement',
              'choices' => $list->getRecouvrement(),
              'required' => false
            ])
          ->add('soc', 'choice',
            [
              'label' => 'Sociabilité',
              'choices' => $list->getSociabilite(),
              'required' => false
            ])
          ->add('vig', 'choice',
            [
              'label' => 'Vigueur',
              'choices' => $list->getVigueur(),
              'required' => false
            ])
          ->add('hauteurMoy', 'choice',
            [
              'label' => 'hauteur moyenne (cm)',
              'choices' => $list->getHauteurMoy(),
              'required' => false
            ])
          ->add('phenologie', 'choice',
            [
              'label' => 'Phénologie(le stade le plus avancé)',
              'choices' => $list->getPhenologie(),
              'required' => false
            ])
          ->add('miseEnPot', 'choice',
            [
              'label' => 'miseEnPot',
              'choices' => $list->getBoolean(),
              'data' => $descriptionVegetation['miseEnPot'],
              'required' => false
            ])
          ->add('miseEnHerbier', 'choice',
            [
              'label' => 'miseEnHerbier',
              'choices' => $list->getBoolean(),
              'data' => $descriptionVegetation['miseEnHerbier'],
              'required' => false
            ])
          ->add('commentaire', null,
            [
              'label' => 'Commentaire',
              'required' => false
            ])
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
            'label' => 'Identifiant observation',
            'associated_property' => 'id'
          ])
        // ->add('observation', null,
        //   [
        //     'label' => 'Numéro observation',
        //     'associated_property' => 'numeroObservation'
        //   ])
        ->add('rec', null, ['label' => 'Recouvrement'])
        ->add('soc', null, ['label' => 'Sociabilité'])
        ->add('vig', null, ['label' => 'Vigueur'])
        ->add('hauteurMoy', null, ['label' => 'Hauteur moyenne'])
        ->add('miseEnPot', null, ['label' => 'Mise en pot'])
        ->add('miseEnHerbier', null, ['label' => 'Mise en herbier'])
        ->add('phenologie', null, ['label' => 'Phénologie'])
        ->add('planteHote', null, ['label' => 'Plante hôte'])
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
        ->with('Information', ['class' => 'col-md-6'])
          ->add('rec', null, ['label' => 'Recouvrement'])
          ->add('soc', null, ['label' => 'Sociabilité'])
          ->add('vig', null, ['label' => 'Vigueur'])
          ->add('hauteurMoy', null, ['label' => 'Hauteur moyenne'])
          ->add('miseEnPot', null, ['label' => 'Mise en pot'])
          ->add('miseEnHerbier', null, ['label' => 'Mise en herbier'])
          ->add('phenologie', null, ['label' => 'Phénologie'])
          ->add('planteHote', null, ['label' => 'Plante hôte'])
        ->end()
        ->with('Autre', ['class' => 'col-md-6'])
          ->add('commentaire', null, ['label' => 'Commentaire'])
        ->end()
      ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
    }

    public function postPersist($object)
    {
    }

    public function postUpdate($object)
    {
    }

    public function preUpdate($object)
    {
    }

}
