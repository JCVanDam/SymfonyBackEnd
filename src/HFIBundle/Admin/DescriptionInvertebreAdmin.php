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

class DescriptionInvertebreAdmin extends AbstractAdmin
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
          ->add('observation', 'sonata_type_model_hidden')
          ->add('codeInvertebre', 'choice',
            [
              'label' => 'Code invértébré',
              'choices' => $list->getCodeInvertebres(),
              'required' => false
            ])
          ->add('morphe', 'choice',
            [
              'label' => 'Morphe',
              'choices' => $list->getMorphe(),
              'required' => false
            ])
          ->add('abondance', 'choice',
            [
              'label' => 'Abondance',
              'choices' => $list->getAbondanceInvertebres(),
              'required' => false
            ])
          ->add('effectifReel', 'integer',
            [
              'label' => 'Effectif réel',
              'required' => false
            ])
          ->add('nbTube', 'integer',
            [
              'label' => 'Nombre de tubes',
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
        ->add('codeInvertebre', null, ['label' => 'Code invértébré'])
        ->add('systematiqueInverte', null, ['label' => 'Systematique'])
        ->add('abondance', null, ['label' => 'Abondance'])
        ->add('morphe', null, ['label' => 'Morph'])
        ->add('effectifReel', null, ['label' => 'Effectif réel'])
        ->add('nbTube', null, ['label' => 'Nombres tube'])
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
        ->with('Information', ['class' => 'col-md-4'])
        ->end()
        ->with('Individu', ['class' => 'col-md-4'])
        ->end()
        ->with('Relevé phytosociologique', ['class' => 'col-md-4'])
        ->end()
        ->with('Commentaire', ['class' => 'col-md-4'])
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
