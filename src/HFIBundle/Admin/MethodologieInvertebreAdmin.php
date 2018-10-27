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

class MethodologieInvertebreAdmin extends AbstractAdmin
{
    protected $datagridValues = [
      '_sort_order' => 'DESC',
    ];

    protected function configureFormFields(FormMapper $formMapper)
    {
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->add('observation', null,
          [
            'label' => 'Numéro observation',
            'associated_property' => 'numeroObservation'
          ])
        ->add('habitatInvertebre', null, ['label' => 'Habitat invértébré'])
        ->add('milieuPrelevement', null, ['label' => 'Milieu prélèvement'])
        ->add('modePrelevement', null, ['label' => 'Mode prélèvement'])
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
        ->with('Milieu', ['class' => 'col-md-6'])
          ->add('habitatInvertebre', null, ['label' => 'Habitat invértébré'])
          ->add('milieuPrelevement', null, ['label' => 'Milieu prélèvement'])
          ->add('milieuAutre', null, ['label' => 'Milieu autre'])
        ->end()
        ->with('Mode', ['class' => 'col-md-6'])
          ->add('modePrelevement', null, ['label' => 'Mode prélèvement'])
          ->add('nbrePersonne', null, ['label' => 'Nombre de personne'])
          ->add('tpsParPers', null, ['label' => 'Temps par personne'])
          ->add('nbrePiege', null, ['label' => 'Nombre de piège'])
          ->add('tpsOuverture', null, ['label' => 'Temps d\'ouverture'])
          ->add('volLongueur', null, ['label' => 'Volume longueur'])
          ->add('volLargeur', null, ['label' => 'Volume largeur'])
          ->add('volHauteur', null, ['label' => 'Volume hauteur'])
          ->add('volumeTerre', null, ['label' => 'Volume terre'])
        ->end()
      ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
    }

    public function postPersist($object)
    {
    }

    public function preUpdate($object)
    {
    }

}
