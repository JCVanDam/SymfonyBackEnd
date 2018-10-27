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
use Sonata\AdminBundle\Route\RouteCollection;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SuiviAdmin extends AbstractAdmin
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
      $suivi = [];
      if ($this->getSubject() && $this->getSubject()->getId()){
        $suivi = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi')
        ->getRepository('HFIBundle:Suivi', 'hfi')
        ->getSuivi($this->getSubject()->getId());
        $suivi['mort'] = ($suivi['mort'] == false) ? "false" : "true" ;
        $suivi['nonTrouve'] = ($suivi['nonTrouve'] == false) ? "false" : "true" ;
      } else {
        $suivi['mort'] = "false";
        $suivi['nonTrouve'] = "false";
      }
      $formMapper
        ->add('dateObservation', DatePickerType::class,
          [
            'dp_collapse'           => true,
            'dp_calendar_weeks'     => true,
            'dp_view_mode'          => 'days',
            'dp_min_view_mode'      => 'days',
            'format' => 'dd.MM.yyyy'
          ])
        ->add('phenologie', 'choice',
          [
            'label' => 'Phénologie',
            'choices' => $list->getPheno(),
            'required' => false
          ])
        ->add('traitement', 'choice',
          [
            'label' => 'Traitement',
            'choices' => $list->getTraitement(),
            'required' => false
          ])
        ->add('competition', 'choice',
          [
            'label' => 'Compétition',
            'choices' => $list->getCompetition(),
            'required' => false
          ])
        ->add('predation', 'choice',
          [
            'label' => 'Prédation',
            'choices' => $list->getPredation(),
            'required' => false
          ])
        ->add('hauteurPhylica', 'integer',
          [
            'label' => 'Hauteur',
            'required' => false
          ])
        ->add('dbhB', 'integer',
          [
            'label' => 'dbhB',
            'required' => false
          ])
        ->add('dbhH', 'integer',
          [
            'label' => 'dbhH',
            'required' => false
          ])
        ->add('mort', 'choice',
          [
            'label' => 'Mort',
            'choices' => $list->getBoolean(),
            'data' => $suivi['mort'],
            'required' => false
          ])
        ->add('nonTrouve', 'choice',
          [
            'label' => 'Non trouvé',
            'choices' => $list->getBoolean(),
            'data' => $suivi['nonTrouve'],
            'required' => false
          ])
      ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->add('phylica', null,
          [
            'label' => 'Numéro de la plante',
            'associated_property' => 'numeroPlant'
          ])
        ->add('phenologie', null, ['label' => 'Phénologie'])
        ->add('traitement', null, ['label' => 'Traitement'])
        ->add('competition', null, ['label' => 'Compétition'])
        ->add('predation', null, ['label' => 'Prédation'])
        ->add('dateObservation', null, ['label' => 'Date d\'Observation'])
        ->add('saison', null, ['label' => 'Saison'])
        ->add('hauteurPhylica', null, ['label' => 'Hauteur Phylica'])
        ->add('dbhB', null, ['label' => 'dbhB'])
        ->add('dbhH', null, ['label' => 'dbhH'])
        ->add('mort', null, ['label' => 'Mort'])
        ->add('nonTrouve', null, ['label' => 'Non trouvé'])
        ->add('_action', null, [
          'actions' => [
            'show' => [],
          ]
        ])
      ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
    }

    public function postPersist($object)
    {
    }

    public function preUpdate($object)
    {
    }

}
