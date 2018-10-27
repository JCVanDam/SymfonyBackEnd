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

class DescriptionVertebreAdmin extends AbstractAdmin
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

      $formMapper
        ->add('nomVernaculaire', EntityType::class,
          [
            'class' => 'HFIBundle\Entity\SystematiqueVertebre',
            'choice_label' => 'vernFaune',
            'placeholder' => ''
          ])
        ->add('abondance', 'choice',
          [
            'label' => 'Abondance',
            'choices' => $list->getAbondance(),
            'required' => false
          ])
        ->add('typeImpact', 'choice',
          [
            'label' => 'Type d\'impact',
            'choices' => $list->getImpact(),
            'multiple' => true,
            'required' => false,
          ])
        ->add('intensiteImpact', 'choice',
          [
            'label' => 'Intensité impact',
            'choices' => $list->getIntensiteImpact(),
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
            'label' => 'Numéro observation',
            'associated_property' => 'numeroObservation'
          ])
        // ->add('nomScientifique', null, ['label' => 'Nom scientifique'])
        ->add('abondance', null, ['label' => 'Abondance'])
        // ->add('typeImpact', null, ['label' => 'Type impact'])
        ->add('intensiteImpact', null, ['label' => 'Intensité de l\'impact'])
        ->add('occupation', null, ['label' => 'Occupation'])
        ->add('nombre', null, ['label' => 'Nombre'])
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
          ->add('abondance', null, ['label' => 'Abondance'])
          ->add('intensiteImpact', null, ['label' => 'Intensité de l\'impact'])
          ->add('occupation', null, ['label' => 'Occupation'])
          ->add('nombre', null, ['label' => 'Nombre'])
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
