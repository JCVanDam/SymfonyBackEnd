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
use PortalBundle\Form\Type\CartoType;

class PhylicaAdmin extends AbstractAdmin
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
      $plantationsArray = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi')
        ->getRepository('HFIBundle:Observation', 'hfi')
        ->getPlantations();
      $plantations = [];
      for($i = 0; $i < sizeof($plantationsArray); $i++){
        $plantations[$plantationsArray[$i]['numeroPlantation']] = $plantationsArray[$i]['numeroPlantation'];
      }
      $formMapper
        ->tab('Phylica')
          ->with('Nom de la plante', ['class' => 'col-md-6'])
          ->end()
          ->with('Informations', ['class' => 'col-md-6'])
          ->end()
          ->with('Localisation', ['class' => 'col-md-12'])
            ->add('Carte', CartoType::class,
              [
                  'label' => " ",
                  'mapped' => false,
                  'data' => [
                      'latitude' => 'latitude',
                      'longitude' => 'longitude',
                      'altitude' => 'altitude',
                      'districts' => ['Kerguelen', 'Amsterdam', 'Crozet'],
                      'astuce' => 'Vous pouvez glisser un fichier GPX directement sur la carte!',
                      'info' => 'Vous pouvez également saisir à la main toutes les données!'
                  ]
              ])
            ->add('altitude', 'number',
              [
                'label' => 'Altitude',
                'required' => false
              ])
            ->add('latitude', 'number',
              [
                'label' => 'Latitude (DDD WGS 84)',
                'required' => false
              ])
            ->add('longitude', 'number',
              [
                'label' => 'Longitude (DDD WGS 84)',
                'required' => false
              ])
          ->end()
          ->with('Commentaire sur le Phylica', ['class' => 'col-md-12'])
            ->add('commentaire', null,
              [
                'label' => 'Commentaire Phylica',
                'required' => false
              ])
          ->end()
          ->with('Suivis', ['class' => 'col-md-12'])
            ->add('suivis', 'sonata_type_collection',
              [
                'label' => 'Suivis',
                'required' => true,
                'by_reference' => false,
              ],
              [
                 'edit' => 'inline',
                 'inline' => 'table',
                 'sortable' => 'position',
              ])
          ->end()
        ->end()
      ;
      if($this->isCurrentRoute('create')) {
        $numPlante = $this
          ->getConfigurationPool()
          ->getContainer()
          ->get('doctrine')
          ->getEntityManager('hfi')
          ->getRepository('HFIBundle:Phylica', 'hfi')
          ->getNumPlante();
        $formMapper
          ->tab('Phylica')
            ->with('Nom de la plante', ['class' => 'col-md-6'])
              ->add('observation', 'choice',
                [
                  'label' => 'Numéro de la plantation',
                  'choices' => $plantations,
                  'mapped' => false,
                  'required' => false
                ])
              ->add('numeroPlant', 'text',
                [
                  'label' => 'Numéro de la plante',
                  'data' => $numPlante,
                  'required' => false
                ])
            ->end()
            ->with('Informations', ['class' => 'col-md-6'])
              ->add('agePlant', 'integer',
                [
                  'label' => "Age de la plante (au moment de la plantation)",
                  'required' => false
                ])
              ->add('datePlantation', DatePickerType::class,
                [
                  'label' => "Date de la plantation",
                  'dp_collapse'           => true,
                  'dp_calendar_weeks'     => true,
                  'dp_view_mode'          => 'days',
                  'dp_min_view_mode'      => 'days',
                  'format' => 'dd.MM.yyyy'
                ])
              ->add('suiviBiannuelle', 'choice',
                [
                  'label' => 'Suivie biannuelle',
                  'choices' => $list->getBoolean(),
                  'required' => false
                ])
            ->end()
          ->end()
        ;
      } else {
        $plantation = $this
          ->getConfigurationPool()
          ->getContainer()
          ->get('doctrine')
          ->getEntityManager('hfi')
          ->getRepository('HFIBundle:Phylica', 'hfi')
          ->getNumeroPlantation($this->getSubject()->getId());
        $phylica = $this
          ->getConfigurationPool()
          ->getContainer()
          ->get('doctrine')
          ->getEntityManager('hfi')
          ->getRepository('HFIBundle:Phylica', 'hfi')
          ->getPhylica($this->getSubject()->getId());
        $phylica['suiviBiannuelle'] = ($phylica['suiviBiannuelle'] == false) ? "false" : "true" ;
        $formMapper
          ->tab('Phylica')
            ->with('Nom de la plante', ['class' => 'col-md-6'])
              ->add('observation', 'choice',
                [
                  'label' => 'Numéro de la plantation',
                  'choices' => $plantations,
                  'mapped' => false,
                  'data' => $plantation['numeroPlantation'],
                  'required' => false
                ])
              ->add('numeroPlant', 'text',
                [
                  'label' => 'Numéro de la plante',
                  'required' => false
                ])
            ->end()
            ->with('Informations', ['class' => 'col-md-6'])
              ->add('agePlant', 'integer',
                [
                  'label' => "Age de la plante (au moment de la plantation)",
                  'required' => false
                ])
              ->add('suiviBiannuelle', 'choice',
                [
                  'label' => 'Suivie biannuelle',
                  'choices' => $list->getBoolean(),
                  'data' => $phylica['suiviBiannuelle'],
                  'required' => false
                ])
            ->end()
          ->end()
        ;
      }
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
    }

    protected function configureListFields(ListMapper $listMapper)
    {
      $listMapper
        ->add('observation', null,
          [
            'label' => 'Numéro de la plantation',
            'associated_property' => 'numeroPlantation'
          ])
        ->add('numeroPlant', null, ['label' => 'Numéro de la plante'])
        ->add('agePlant', null, ['label' => 'Age de la plante'])
        ->add('suiviBiannuelle', null, ['label' => 'Suivi biannuelle'])
        ->add('commentaire', null, ['label' => 'Commentaire'])
        ->add('_action', null, [
          'actions' => [
            'show' => [],
            'edit' => [],
            'delete' => [],
          ]
        ])
      ;
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
    }

    public function validate(ErrorElement $errorElement, $object)
    {
    }

    public function prePersist($object)
    {
      foreach($object->getSuivis() as $Suivi){
        $Suivi->setPhylica($object);
      }
    }

    public function postPersist($object)
    {
      $form = $this->getForm();
      $plantationId = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi')
        ->getRepository('HFIBundle:Observation', 'hfi')
        ->getPlantation($form->get('observation')->getData());
      if($object->getId() && $plantationId){
        $this
          ->getConfigurationPool()
          ->getContainer()
          ->get('doctrine')
          ->getEntityManager('hfi')
          ->getRepository('HFIBundle:Observation', 'hfi')
          ->updateForeignKeyPhylica($object->getId(), $plantationId);
      }
    }

    public function preUpdate($object)
    {
      foreach($object->getSuivis() as $Suivi){
        $Suivi->setPhylica($object);
      }
    }

    public function postUpdate($object)
    {
      $form = $this->getForm();
      $plantationId = $this
        ->getConfigurationPool()
        ->getContainer()
        ->get('doctrine')
        ->getEntityManager('hfi')
        ->getRepository('HFIBundle:Observation', 'hfi')
        ->getPlantation($form->get('observation')->getData());
      if($object->getId() && $plantationId){
        $this
          ->getConfigurationPool()
          ->getContainer()
          ->get('doctrine')
          ->getEntityManager('hfi')
          ->getRepository('HFIBundle:Observation', 'hfi')
          ->updateForeignKeyPhylica($object->getId(), $plantationId);
      }
    }

}
